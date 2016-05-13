// JavaScript Document
$(function () {
  'use strict';
  var allowItemsButtonsFadeOut = true;
  var hideGuideGrid = false;  
  var guidesGrid = [];
  var hideGridTimeout = null;
  var pageConfig = null;

  
  
  // Constructor
  function init()
  {
    var options = {
      float: true,
      draggable: {
        handle: '.avi-dragHandle'
      }
    };
    $('.grid-stack').gridstack(options);
    restoreSavedState();
    $('[data-toggle="tooltip"]').tooltip();
  }
  
  function restoreSavedState()
  {
    // Only restore when there are any restoration data available
    if(typeof(AVIQWPageConfig) !== 'undefined' && AVIQWPageConfig && typeof(AVIQWElementsConfig) !== 'undefined' && AVIQWElementsConfig)
    {
      pageConfig = JSON.parse(AVIQWPageConfig);
      var elementsConfig = JSON.parse(AVIQWElementsConfig);
      if(pageConfig && elementsConfig)
      {
        new function () {
            this.serializedData = elementsConfig;
  
            this.grid = $('.grid-stack').data('gridstack');
  
            this.loadGrid = function () {
                this.grid.removeAll();
                var items = GridStackUI.Utils.sort(this.serializedData);
                _.each(items, function (node, i) {
                    var nodeHtml = $('<div><div class="grid-stack-item-content"></div></div>');
                    // If there's any saved HTML, let's replace the default empty content.
                    if(node.content)
                    {
                      var newItem = $(decodeURIComponent(node.content));
                      // we need to remove an invisible resizing div, added by jQuery UI that's being captured when an element is saved. 
                      // if we don't do this, this element will effectively exist twice and that causes the resize button to stop working.
                      nodeHtml.html(newItem.filter('.grid-stack-item-content,.avi-itemBtn'));
                    }
                    
                    nodeHtml
                      // Important to determine widget type after serialization
                      .data('type', node.type)
                      // to tell the system what element to update
                      .data('id', node.id);
                    
                    // Enable the tint button in restored items
                    nodeHtml.find('.avi-tint').colorpicker();
                    
                    this.grid.addWidget(nodeHtml,
                        node.coordinate_x, node.coordinate_y, node.size_x, node.size_y);
                }, this);
                return false;
            }.bind(this);
  
            this.loadGrid();
            resizeGrid();
        };
        console.log(pageConfig);
        console.log(elementsConfig);
      } else {
        console.error('No saved data recovered');
      }
    }
  }
  
  function newEditor(o)
  {
    o.summernote({
      height: 70,
      placeholder: 'Write content here...',
      dialogsInBody: true,
      disableDragAndDrop: true,
      toolbar: [
        // [groupName, [list of button]]
        ['undoredo', ['undo', 'redo']],
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontname', 'fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]
    });
  
    resizeSummerNote(o);
  }
    
  function resizeSummerNote(o)
  {
    console.log('correcting summernote');
    var sn = o.parent().find('.note-editor');
    if(sn.length > 0)
    {
      var containerHeight = sn.closest('.grid-stack-item-content').innerHeight();
      console.log(containerHeight );
      var toolbarHeight = sn.find('.note-toolbar').outerHeight();
      var editableContent = sn.find('.note-editable');
      var constant = 22;
      sn.find('.note-editable').height( containerHeight  - toolbarHeight - constant );
    }
  }
  
  $(document)
    .on('change', '.avi-boxBg,.avi-bodyBg', function(e){
      e.preventDefault();
      var o = $(this);
      // Check for the various File API support.
      if (window.File && window.FileReader && window.FileList && window.Blob) {
        // Great success! All the File APIs are supported.
      } else {
        alert('The File APIs are not fully supported in this browser.');
        return false;
      }
      console.log('b');
      var files = $(this)[0].files;
      var f = files[0];
      if(f.type.indexOf('image/') === -1)
      {
        alert('Please upload a valid image.');
        return false;
      }
      console.log('c');
      var b64 = null;
      try{
      console.log('c1');
        console.log(f);
        var reader = new FileReader();
        
  
        // Closure to capture the file information.
        reader.onload = (function(theFile) {
          console.log('c4 loaded');
          return function(e) {
            var target = o.closest('.grid-stack-item').find('.grid-stack-item-content');
            if(o.hasClass('avi-bodyBg'))
            {
              target = $('body');
            }
            target.css('background-image', 'url(\'' + e.target.result + '\')');
            $(document).trigger('avi:activateSaveBtn');
          };
        })(f);
      console.log('c2');
  
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
      console.log('c3');
      } catch(e) {
        alert('Processing your image has failed. Please upgrade your browser to Chrome.');
        console.log(e);
        return false;
      }
      console.log('d');
      /*var b64 = window.btoa(files);*/
      if(b64 !== null)
      {
        console.log('e');
        console.log(b64);
      }
    })
    .on('click', '.avi-removeItem', function(e){
      e.preventDefault();
      if(confirm('Are you sure you want to remove this widget?'))
      {
        var container = $(this).closest('.grid-stack-item');
        if(container.length > 0)
        {
          container.fadeOut('slow');
        }
      }
    })
    .on('click', '.avi-toggleEdit', function(e){
      e.preventDefault();
      $(document).trigger('avi:activateSaveBtn');
      var container = $(this).closest('.grid-stack-item').find('.grid-stack-item-content');
      if(container.length > 0)
      {
        if($(this).hasClass('avi-editing'))
        {
          var sn = container.find('textarea.avi-editor');
          var html = $('<div class="avi-contentContainer">' + sn.summernote('code') + '</div>');    
          sn.summernote('destroy'); 
          container.empty().append(html);
          $(this)
            .removeClass('avi-editing')
            .find('i')
              .removeClass('fa-check')
              .addClass('fa-pencil');
        } else {
          $(this)
            .addClass('avi-editing')
            .find('i')
              .removeClass('fa-pencil')
              .addClass('fa-check');
          var sn = $('<textarea class="avi-editor">' + container.find('.avi-contentContainer').html() + '</textarea>');
          container.empty().append(sn);
          newEditor(sn);
        }
      } else {
        console.error('Container not found!');
      }
    });
  // cache all of grid's boxes position and dimensions on page load and window resize, so every time the mouseover code is executed, it will not search the DOM (performance improvement)
  function cacheGuidesGridCoords()
  {
    guidesGrid = [];
    $('.avi-box')
      .each(function(){
        guidesGrid.push({
          offset: $(this).offset(),
          width: $(this).outerWidth(),
          height: $(this).outerHeight(),
          dom: $(this)
        });
      });
  }
  $(window)
    .on('load', cacheGuidesGridCoords)
    .on('resize', cacheGuidesGridCoords);
  // when a grid guide is clicked, ask if a new widget should be added in the selected place
  $(document)
    .on('click', function(e){
      if(guidesGrid.length === 0)
      {
        return;
      }
      
      for(var i in guidesGrid)
      {
        if(guidesGrid.hasOwnProperty(i))
        {
          if(e.pageX >= guidesGrid[i].offset.left && e.pageX <= guidesGrid[i].offset.left + guidesGrid[i].width && e.pageY >= guidesGrid[i].offset.top && e.pageY <= guidesGrid[i].offset.top + guidesGrid[i].height)
          {
            // Check that there is no overlaying widget before asking if they want to add a new widget.
            var isObscured = false;
            $('.avi-combinedGrid .grid-stack>div')
              .each(function(){
                var offset = $(this).offset();
                var width = $(this).outerWidth();
                var height = $(this).outerHeight();
                if(e.pageX >= offset.left && e.pageX <= offset.left + width && e.pageY >= offset.top && e.pageY <= offset.top + height)
                {
                  isObscured = true;
                  return;
                }
              });
            if(isObscured)
            {
              return;
            }
            //guidesGrid[i].dom.addClass('hit');
//            alert('Do you want to add a new widget here?');
          }
        }
      }
    })
    .on('click', '#avicreatepage', function(e){
      e.preventDefault();
      var owner = $(this);
      if(!owner.hasClass('disabled'))
      {
        // Close the editing mode before we proceed.
        $('.avi-editing').trigger('click');
        
        if($('.grid-stack-item:visible').length > 0)
        {
          var grid = $('.grid-stack').data('gridstack');
          
          var items = _.map($('.grid-stack .grid-stack-item:visible'), function (el) {
              el = $(el);
              var node = el.data('_gridstack_node');
              return {
                  id: el.data('id'),
                  type: el.data('type'),
                  coordinate_x: node.x,
                  coordinate_y: node.y,
                  size_x: node.width,
                  size_y: node.height,
                  content: encodeURIComponent(el.html())
              };
          });
          
          console.log(items);
          owner.addClass('disabled').prop('disabled', true);
          if(pageConfig === null)
          {
            pageConfig = {};
          }
          
          pageConfig.layout = items;
          pageConfig.bg_color = $('body').css('background-color');
          pageConfig.bg_image = $('body').css('background-image');
          pageConfig.securitytoken = $('#securitytoken').val();
          console.log($('body').css('background-image'));
          
          $.ajax({
            url: 'createpage.php',
            cache: false,
            type: 'POST',
            dataType: 'json',
            contentType:"application/json; encoding=utf8",
            data: JSON.stringify(pageConfig),
            success: function(r) {
              if(parseInt(r.status) > 0)
              {
                window.location = 'login.php';
              } else {
                alert(r.error);
              }
            },
            error: function(a,b,c) {
              console.error(a,b,c);
            },
            complete: function() {
              owner.removeClass('disabled').removeAttr('disabled');
            }
          });
        } else {
          alert('Cannot save an empty page! Please add at least one widget.');
        }
      }
    })
    .on('mousemove', function(e){
      if(hideGuideGrid || guidesGrid.length === 0)
      {
        return;
      }
      
      if(hideGridTimeout === null)
      {
        $('.avi-guidesGrid').stop().clearQueue().animate({opacity: 1}, 'slow');
        $('.avi-itemBtn').stop().clearQueue().css('opacity', 1);
        hideGridTimeout = setTimeout(function(){
          $('.avi-guidesGrid').stop().clearQueue().animate({opacity: 0}, 'slow');
          hideGridTimeout = null;
          if(allowItemsButtonsFadeOut)
          {
            $('.avi-itemBtn')
              .stop()
              .clearQueue()
              .animate({opacity: 0}, 'slow');
          }
        }, 5000);
      }
      
     
      for(var i in guidesGrid)
      {
        if(guidesGrid.hasOwnProperty(i))
        {
          if(e.pageX >= guidesGrid[i].offset.left && e.pageX <= guidesGrid[i].offset.left + guidesGrid[i].width && e.pageY >= guidesGrid[i].offset.top && e.pageY <= guidesGrid[i].offset.top + guidesGrid[i].height && !guidesGrid[i].dom.hasClass('hover'))
          {
            $('.hover').removeClass('hover');
            guidesGrid[i].dom.addClass('hover');
          }
        }
      }
    })
    .on('click', '.avi-bg', function(e){
      e.preventDefault();
      console.log('sds');
      var fup = $(AVIJST.backgroundPopup());
      fup.mouseleave(function(){
        $(this).fadeOut('slow', function(){ $(this).remove(); });
      });
      $(this).after(fup.fadeIn('slow'));
    })
    .on('showPicker.colorpicker', function(event){        
      allowItemsButtonsFadeOut = false;
    })
    .on('hidePicker.colorpicker', function(event){
      allowItemsButtonsFadeOut = true;
      $(document).trigger('avi:activateSaveBtn');
    })
    .on('changeColor.colorpicker', function(event){
      var c = event.color.toRGB();
      var yiq = ((c.r*299)+(c.g*587)+(c.b*114))/1000;
      var textColor = (yiq >= 128) ? 'black' : 'white';
      var siteElement = $(event.target).parent();
      siteElement
        .find('.grid-stack-item-content,.note-editable')
          .css('background-color', 'rgba(' + c.r + ',' + c.g + ',' + c.b + ',' + c.a + ')')
          .find('.control-label')
            .css('color', textColor);
      console.log(c.a);
      if(c.a === 0)
      {
        siteElement.find('.grid-stack-item-content').removeClass('avi-contentPadding');
      } else {
        siteElement.find('.grid-stack-item-content').addClass('avi-contentPadding');
      }
    });
/*      .on('showPicker.colorpicker', function(){
        console.log('hoo');
        hideGuideGrid = true;
      })
      .on('hidePicker.colorpicker', function(){
        hideGuideGrid = false;
      });*/
      
      
      
    $('.avi-mainBg').colorpicker()
      .on('changeColor.colorpicker', function(event){
        $('body,.avi-box').css('background-color', event.color.toHex());
        clearTimeout(hideGridTimeout);
        hideGridTimeout = null;
        $('.avi-guidesGrid').stop().clearQueue().css('opacity', 0);
      });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    $(document)
      .on( 'resizestop', '.grid-stack-item', function( event, ui ) {
        var tr = $(this);
        setTimeout(function(){ 
          resizeSummerNote(tr); 
          $(document).trigger('avi:activateSaveBtn');
        },150);
        console.log('resized');
      })
      .on('avi:activateSaveBtn', function(){
        // enable the Create button
        $('#btnAddText').removeClass('btn-primary').addClass('btn-default');
        $('#avicreatepage').prop('disabled', false).removeClass('disabled btn-default').addClass('btn-primary');
      })
      .on('click', '.avi-add-new-widget', function(e){
        $(document).trigger('avi:activateSaveBtn');
        e.preventDefault();
        var grid = $('.grid-stack').data('gridstack');
  
        var items = _.map($('.grid-stack .grid-stack-item:visible'), function (el) {
            el = $(el);
            var node = el.data('_gridstack_node');
            return {
                id: el.data('id'),
                type: el.data('type'),
                coordinate_x: node.x,
                coordinate_y: node.y,
                size_x: node.width,
                size_y: node.height
            };
        });
        
        console.log(items);
        var furthestX = 0;
        var furthestY = 0;
        
        for(var i in items)
        {
          // Find the furthest vertical item first
          if(items[i].coordinate_y > furthestY)
          {
            furthestY = items[i].coordinate_y + items[i].size_y;
          }
          
          // Find the furthest horizontal dimension of the furthest vertical item
          if(items[i].coordinate_y >= furthestY)
          {
            furthestX = items[i].coordinate_x + items[i].size_x;
          }
        }
        
        var nextX = 0;
        var nextY = furthestY;
        
        
        var node = {
            coordinate_x: nextX,
            coordinate_y: nextY,
            size_x: 6,
            size_y: 4
        };      
        
        var sn = false;
        // Text Editor
        if($(this).data('type') === 1)
        {
          sn = $('<textarea class="avi-editor"></textarea>');
        }
        var newItem = $(AVIJST.newItem({
          editor: (sn ? true : false)
        }));
        
        // Todo: implement Buttons
        
        // Contact form
        if($(this).data('type') === 4)
        {
          newItem.find('.grid-stack-item-content').append(AVIJST.contactForm());
        }
        
        // Important to determine widget type after serialization
        newItem
          .data('type', $(this).data('type'));
        
        grid.addWidget(newItem, node.coordinate_x, node.coordinate_y, node.size_x, node.size_y);
        
        // Enable the tint button in new items
        newItem.find('.avi-tint').colorpicker();
        
        
        if(sn)
        {
          newItem.find('.grid-stack-item-content').append(sn);
          newEditor(newItem.find('textarea.avi-editor'));
        }
      });
  
  
  
  
      // thanks to http://stackoverflow.com/a/22885503
      var waitForFinalEvent=function(){var b={};return function(c,d,a){a||(a="I am a banana!");b[a]&&clearTimeout(b[a]);b[a]=setTimeout(c,d)}}();
      var fullDateString = new Date();
      function isBreakpoint(alias) {
          return $('.device-' + alias).is(':visible');
      }

      function resizeGrid() {
          var grid = $('.grid-stack').data('gridstack');
          if (isBreakpoint('xs')) {
              $('#grid-size').text('One column mode');
          } else if (isBreakpoint('sm')) {
              grid.setGridWidth(3);
              $('#grid-size').text(3);
          } else if (isBreakpoint('md')) {
              grid.setGridWidth(6);
              $('#grid-size').text(6);
          } else if (isBreakpoint('lg')) {
              grid.setGridWidth(12);
              $('#grid-size').text(12);
          }
      };
      $(window).resize(function () {
          waitForFinalEvent(function() {
              resizeGrid();
          }, 300, fullDateString.getTime());
      });
      
      init();
  });