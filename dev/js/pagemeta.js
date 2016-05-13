// JavaScript Document
function sanitize(input) {
  'use strict';
  var allowedChars = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '-', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
  var output = '';
  var inp = input.toLowerCase().replace(/ /gi, '-');
  for(var i = 0; i < input.length; i++)
  {
    var letter = inp.substr(i, 1);
    if(letter === 'å')
    {
      output += 'ao';
      continue;
    }
    if(letter === 'æ')
    {
      output += 'ae';
      continue;
    }
    if(letter === 'ø')
    {
      output += 'oe';
      continue;
    }
    if(allowedChars.indexOf(letter) !== -1)
    {
      output += letter;
    }
  }
  return output;
}
$(document).on('keyup', '#name', function(){
  var slug = $(this).val();
  if(slug.length >= 20)
  {
    slug = slug.substr(0, 20);
  }
  $('#slug').val(sanitize(slug));
});