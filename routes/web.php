<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TestXssController;
use App\Http\Controllers\HomeClubController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Live\LiveController;
use App\Http\Controllers\RencontreController;
use App\Http\Controllers\MessagerieController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\FormcontactController;
use App\Http\Controllers\Live\ConfigController;
use App\Http\Controllers\VerifyemailController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\Live\ConnexionController;
use App\Http\Controllers\Admin\AdminCommentaireController;
use App\Livewire\Auth\Index;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/* Accueil */

Route::get('/', [HomeClubController::class, 'home'])->name('home');

Route::get('/login', function () {return view('auth.login');})->name('login');

/* Choix de langue */

Route::get('/choice-language/{choice}', [LangueController::class, 'choice'])->name('choicelanguage');


/* Création de compte */

Route::get('/createaccount', function () {return view('create-account-fan');})->name('createaccount.fan');

Route::get('/createaccount/media', function () {return view('create-account-media');})->name('createaccount.media');

Route::get('/question', function () {return view('auth.question');})->name('question');

Route::get('/bio', function () {return view('auth.bio');})->name('bio'); /* ne pas oublier de remettre le middl register */

Route::get('/register', function () {return view('auth.register');})->name('register'); /* ne pas oublier de remettre le middl register */

Route::get('/register/media', [RegisterController::class, 'media'])->name('register.media');

Route::get('/email/verify', [VerifyemailController::class, 'index'])->middleware('auth')->name('verification.notice');


/* Formulaire de contact */

Route::controller(FormcontactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact');
    Route::post('/contact/message', 'store')->name('submitcontact');
});

/* Laravel Fortify */

Route::get('/forgot-password', function () {return view('auth.forgot-password');})->name('forgot-password');

Route::get('/reset-password', function () {return view('auth.reset-password');})->name('reset-password');


/* Compte utilisateur */

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/home/{activity?}', Index::class)->name('profil');
    Route::get('/account/delete', [AccountController::class, 'delete'] )->name('suppressioncompte'); 
});

/* Profil public*/

Route::controller(ProfilController::class)->group(function (){
    Route::get('/profil/{pseudo}','show')->name('profilpublic');
    Route::get('/profil-public/mail/{destinataireid}', 'mail')->middleware(['auth','verified'])->name('messageprive');
    Route::get('/profil-public/{iduser}/complete', 'complete')->middleware(['auth','verified'])->name('completeprofilpublic');
    Route::post('/profil-public/update', 'update')->middleware(['auth','verified'])->name('updateprofilpublic');
});

/* Messagerie utilisateur */

Route::middleware(['auth','verified'])->prefix('mailbox')->controller(MessagerieController::class)->group(function () {
    Route::get('/', 'index')->name('messagerie');
    Route::get('/r/{idmessage}', 'readmessage')->name('readmessage');
    Route::post('/mail/valid/for/{destinataireid}', 'submitmessageprive')->name('submitmessageprive');
    Route::get('/w', 'writemessage')->name('writemessage');
    Route::get('/trash', 'corbeillemessagerie')->name('corbeillemessagerie');
    Route::post('/mail/delete', 'deletemessage')->name('deletemessage');
    Route::post('/mail/forcedelete', 'forcedeletemessage')->name('forcedeletemessage');
    Route::get('/mail/restore/{idmessage}', 'restoredeletedmessage')->name('restoredeletedmessage');
    Route::get('/mail/reply/{idmessage}', 'replymessage')->name('replymessage');

});

/* Gestion des commentaires par les utilisateurs */

Route::middleware(['auth','verified'])->controller(CommentaireController::class)->name('commentaire.')->group(function () {
    Route::post('/commentaire/store', 'store')->name('store');
    Route::post('/post/update', 'update')->name('update');
    Route::post('/post/delete', 'delete')->name('delete');
    Route::post('/post/signal', 'signal')->name('signal');
});

/* Administration */

Route::middleware(['auth','verified','admin'])->controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('/','index')->name('index');    
    Route::get('/commentaires','comment')->name('comments');
     // Messagerie
     Route::get('/messagerieDooze', 'mailbox')->name('mailbox');
     Route::post('/message/delete', 'deletemail')->name('deletemail');
     Route::get('/message/read/{idmessage}', 'readmail')->name('readmail');
     Route::get('/messagerie/trash', 'corbeillemail')->name('corbeillemail');
     Route::post('/message/forcedelete', 'forcedeletemail')->name('forcedeletemail');
     Route::get('/message/restore/{idmessage}', 'restoredeletedmail')->name('restoredeletedmail');
});
    // Gestion des commentaires
Route::middleware(['auth','verified','admin'])->controller(AdminCommentaireController::class)->prefix('admin')->name('admin.')
    ->group(function () {
    Route::get('/commentaire/proceduredelete/{idcommentaire}','proceduredelete')->name('comment.proceduredelete');
    Route::post('/commentaire/delete/','delete')->name('comment.delete');
    Route::post('/commentaire/forcedelete/','forcedelete')->name('comment.forcedelete');
    Route::post('/commentaire/restore/','restore')->name('comment.restore');
    Route::post('/commentaires/check','check')->name('comments.check');
    Route::post('/commentaires/signalras','signalras')->name('comments.signalras');
    Route::post('/commentaires/signalrasconfirm', 'signalrasconfirm')->name('comments.signalrasconfirm');
});   
    // Envoi d'email
    Route::view('/mailbox', 'admin.layouts.mailbox')->name('email');


/* Live  */

Route::prefix('live')->name('live.')->group(function () {
    Route::get('/create', [ConfigController::class, 'index'] )->name('create'); 
    Route::post('/config', [ConfigController::class, 'config'] )->name('config'); 
    Route::get('/session/{idlive}', [ConnexionController::class, 'index'] )->name('connexion'); 
    Route::post('/login', [ConnexionController::class, 'login'] )->name('login'); 
    Route::resource('/get', LiveController::class)->names([
        'index' => 'session'
    ])->middleware('live');
    
});
 

// Détail du match

Route::get('/match/{id}', RencontreController::class)->name('detailrencontre');

/* Page Don */

Route::view('/donate', 'don')->name('don');

/* Présentation */

Route::get('/info',  [PresentationController::class, 'index'])->name('info');

/* Présentation de l'API Dooze */

Route::view('/api', 'api-dooze')->name('api');


/* Compétitions */

Route::get('/competition/{url}', [CompetitionController::class, 'index'])->name('competition');

/* Pages des clubs */

Route::get('/club/{club}', [HomeClubController::class, 'club'])->name('club');

Route::get('/club/{club}?page=socialmedia', [HomeClubController::class, 'club'])->name('socialmedia');

/* Test */

Route::view('/scores', 'tests.testscores');

Route::view('/gif', 'tests.testgif');

Route::get('/xss', [TestXssController::class, 'index']);

Route::get('/octone', function () {return 'Hello World';});





   

