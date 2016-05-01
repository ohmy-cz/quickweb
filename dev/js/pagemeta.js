// JavaScript Document
function sanitize(input) {
  'use strict';
  var allowedChars = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '-'];
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
  $('#slug').val(sanitize($(this).val()));
});