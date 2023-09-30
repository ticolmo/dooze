<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeClubController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ChoixclubController;
use App\Http\Controllers\Live\LiveController;
use App\Http\Controllers\RencontreController;
use App\Http\Controllers\MessagerieController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FormcontactController;
use App\Http\Controllers\Live\ConfigController;
use App\Http\Controllers\VerifyemailController;
use App\Http\Controllers\ProfilpublicController;
use App\Http\Controllers\Live\ConnexionController;
use App\Http\Controllers\Admin\AdminPostController;

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

/* Choix de langue */

Route::get('/choice-language/{choice}', [LangueController::class, 'choice'])->name('choicelanguage');

Route::view('/scores', 'testscores');

/* Accueil */

Route::get('/', [HomeClubController::class, 'index'])->name('home');

/* Premières étapes de la création de compte */

Route::controller(ChoixclubController::class)->group(function (){
    Route::get('/club', 'index')->name('createaccount');
    Route::post('/question', 'store')->name('question');
    Route::post('/question/result', 'validation')->name('validation'); 
});

/* Formulaire de contact */

Route::controller(FormcontactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact');
    Route::post('/contact/message', 'store')->name('submitcontact');
});

/* Gestion du compte utilisateur via Laravel Fortify */

Route::get('/register', [RegisterController::class, 'index'])->middleware('register')->name('register');

Route::get('/email/verify', [VerifyemailController::class, 'index'])->middleware('auth')->name('verification.notice');

Route::get('/login', function () {return view('auth.login');})->name('login');

Route::get('/home', [ProfilController::class, 'index'])->middleware(['auth','verified'])->name('profil');

Route::get('/home/edit', [ProfilController::class, 'edit'])->middleware(['auth','verified'])->name('modificationprofil');

Route::get('/forgot-password', function () {return view('auth.forgot-password');})->name('forgot-password');

Route::get('/reset-password', function () {return view('auth.reset-password');})->name('reset-password');

Route::post('/account/delete', [ProfilController::class, 'delete'])->middleware(['auth','verified'])->name('suppressioncompte');

/* Profil public*/

Route::controller(ProfilpublicController::class)->group(function (){
    Route::get('/profil-public/{iduser}','show')->name('profilpublic');
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

Route::middleware(['auth','verified'])->controller(PostController::class)->name('post.')->group(function () {            
    Route::post('/commentclub', 'storeCommentaireclub')->name('commentaireclub');
    Route::post('/replyclub', 'storeReponseclub')->name('reponseclub');
    Route::post('/commentvisiteur','storeCommentairevisiteur')->name('commentairevisiteur');
    Route::post('/replyvisiteur', 'storeReponsevisiteur')->name('reponsevisiteur');
    Route::post('/pub/update', 'update')->name('update');
    Route::post('/pub/delete', 'delete')->name('delete');
    Route::post('/pub/signal', 'signal')->name('signal');
});

/* Administration */

Route::middleware(['auth','verified','admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    // Gestion des commentaires
    Route::get('/commentaires', [AdminController::class, 'comment'])->name('comments');
    Route::get('/commentaire/proceduredelete/{idcommentaire}', [AdminPostController::class, 'proceduredelete'])->name('comment.proceduredelete');
    Route::post('/commentaire/delete/', [AdminPostController::class, 'delete'])->name('comment.delete');
    Route::post('/commentaire/forcedelete/', [AdminPostController::class, 'forcedelete'])->name('comment.forcedelete');
    Route::post('/commentaire/restore/', [AdminPostController::class, 'restore'])->name('comment.restore');
    Route::post('/commentaires/check', [AdminPostController::class, 'check'])->name('comments.check');
    Route::post('/commentaires/signalras', [AdminPostController::class, 'signalras'])->name('comments.signalras');
    Route::post('/commentaires/signalrasconfirm', [AdminPostController::class, 'signalrasconfirm'])->name('comments.signalrasconfirm');
    // Messagerie
    Route::get('/messagerie', [AdminController::class, 'mailbox'])->name('mailbox');
    Route::post('/message/delete', [AdminController::class, 'deletemail'])->name('deletemail');
    Route::get('/message/read/{idmessage}', [AdminController::class, 'readmail'])->name('readmail');
    Route::get('/messagerie/trash', [AdminController::class, 'corbeillemail'])->name('corbeillemail');
    Route::post('/message/forcedelete', [AdminController::class, 'forcedeletemail'])->name('forcedeletemail');
    Route::get('/message/restore/{idmessage}', [AdminController::class, 'restoredeletedmail'])->name('restoredeletedmail');
});

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
 
/* Fonctionnalités*/

// Affichage d'un commentaire après click sur commentaire sélectionné sur page club ou sur profil public
Route::get('/features/{idpublication}', [FeatureController::class, 'commentaireunique'])->name('commentaire.pleinepage');

// Détail du match
Route::get('/detailrencontre/{id}', RencontreController::class)->name('detailrencontre');

/* Page Don */

Route::view('/donate', 'don')->name('don');

/* Pages des clubs */

Route::get('/{club}', [HomeClubController::class, 'show'])->name('club');


   

