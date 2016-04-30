this["AVIJST"] = this["AVIJST"] || {};

this["AVIJST"]["newItem"] = Handlebars.template({"1":function(container,depth0,helpers,partials,data) {
    return "avi-itemBtnHighlight";
},"3":function(container,depth0,helpers,partials,data) {
    return "<a class=\"avi-itemBtn avi-toggleEdit avi-editing avi-itemBtnHighlight\" href=\"#\"><i class=\"fa fa-check\"></i></a>";
},"compiler":[7,">= 4.0.0"],"main":function(container,depth0,helpers,partials,data) {
    var stack1, alias1=depth0 != null ? depth0 : {};

  return "<div>\r\n  <div class=\"grid-stack-item-content avi-contentPadding\"></div>\r\n  <span class=\"avi-itemBtn avi-tint\"><i class=\"fa fa-tint\"></i></span>\r\n  <span class=\"avi-itemBtn avi-bg "
    + ((stack1 = helpers.unless.call(alias1,(depth0 != null ? depth0.editor : depth0),{"name":"unless","hash":{},"fn":container.program(1, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + "\" data-toggle=\"tooltip\" title=\"test\"><i class=\"fa fa-image\"></i></span>\r\n  <span class=\"avi-itemBtn avi-dragHandle\"><i class=\"fa fa-arrows\"></i></span>\r\n  "
    + ((stack1 = helpers["if"].call(alias1,(depth0 != null ? depth0.editor : depth0),{"name":"if","hash":{},"fn":container.program(3, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + "\r\n  <span class=\"avi-itemBtn avi-resize\"><i class=\"fa fa-expand\"></i></span>\r\n</div>";
},"useData":true});