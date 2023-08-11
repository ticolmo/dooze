// Sélection groupée des commentaires / messages à supprimer
$('#master-checkbox').change(function() {
    const isChecked = $(this).prop('checked');
    $('.checkbox').prop('checked', isChecked);
  });
$('#master-checkboxrep').change(function() {
  const isChecked = $(this).prop('checked');
  $('.checkboxrep').prop('checked', isChecked);
});
$('#master-checkboxenv').change(function() {
  const isChecked = $(this).prop('checked');
  $('.checkboxenv').prop('checked', isChecked);
});
$('#master-checkboxcorb').change(function() {
  const isChecked = $(this).prop('checked');
  $('.checkboxcorb').prop('checked', isChecked);
});

// Suppression des messages de la Messagerie
$("#selection1").click(function() {
  $("#boitereception").submit();
});
$("#selection2").click(function() {
  $("#boiteenvoi").submit();
});
$("#selection3").click(function() {
  $("#corbeille").submit();
});

  