GMaps.prototype.addStyle = function(options) {
  var styledMapType = new google.maps.StyledMapType(options.styles, { name: options.styledMapName });

  this.map.mapTypes.set(options.maptype_id, styledMapType);
};

GMaps.prototype.setStyle = function(maptype_id) {
  this.map.setMaptype_id(maptype_id);
};
