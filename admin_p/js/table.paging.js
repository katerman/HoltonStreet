$(function() {
	function pagination() {
	 $('table[data-provide=pagination]').each(function() {
	    var $table = $(this);
	    var $pager = $('<ul></ul>');
	     
	    var currentPage = 0;
	    var numPerPage = 20;//$("#instancesPerPage").val();
	    var numRows = $table.find('tbody tr').length;
	    var numPages = Math.ceil(numRows / numPerPage);
	
	    $table.unbind('repaginate');
	    
	    $table.bind('repaginate', function() {
	        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
	    });
	    
	    for (var page = 0; page < numPages; page++) {
	        var link = '<a href="#">' + page + '</a>';
	        
	        $('<li></li>').html(link).on('click', { newPage: page}, function(event) {
	            currentPage = event.data['newPage'];
	            $table.trigger('repaginate');
	            $(this).addClass('active').siblings().removeClass('active');
	        }).appendTo($pager);    
	    }
	
	    $pager.find("li:first-child").addClass('active');
	     
	    $($table.data('pager')).html($pager);
	    $table.trigger('repaginate');
	 });
	};
	
	pagination();
	
	$('#instancesPerPage').on("change", function() {
	 pagination();
	});
});