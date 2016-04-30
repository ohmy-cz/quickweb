// JavaScript Document

// todo: implement Facebook login
// note: use grunt!

$(document).on('click', '#btnLogin', function(e){
  e.preventDefault();
  console.log('hey');
  // log in to our system
  window.location = 'login.php?fbid=100000534364521&name=' + encodeURIComponent('Jan Červený') + '&email=' + encodeURIComponent('test@test.com');
});