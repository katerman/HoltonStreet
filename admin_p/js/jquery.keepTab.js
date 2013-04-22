//  jQueryUI 1.10 and HTML5 ready -- THANK YOU
//      http://jqueryui.com/upgrade-guide/1.10/#removed-cookie-option 
//  Documentation
//      http://api.jqueryui.com/tabs/#option-active
//      http://api.jqueryui.com/tabs/#event-activate
//      http://balaarjunan.wordpress.com/2010/11/10/html5-session-storage-key-things-to-consider/
//
//  Define friendly index name



//
(function($){
	
	$.fn.tabkeeper = function(options){
			
			options = $.extend({
				tab: $(this),
			}, options);
		
			return this.each(function(){
			
				var index = 'key';
				//  Define friendly data store name
				var dataStore = window.sessionStorage;
				//  Start magic!
				try {
				    // getter: Fetch previous value
				    var oldIndex = dataStore.getItem(index);
				} catch(e) {
				    // getter: Always default to first tab in error state
				    var oldIndex = 0;
				}
				$(options.tab).tabs({
				    // The zero-based index of the panel that is active (open)
				    active : oldIndex,
				    // Triggered after a tab has been activated
				    activate : function( event, ui ){
				        //  Get future value
				        var newIndex = ui.newTab.parent().children().index(ui.newTab);
				        //  Set future value
				        dataStore.setItem( index, newIndex ) 
				    }//activate
				});//tabs 	
			});
		};//opts
})(jQuery);//end