$(function(){

	//datatable
	if($('.dt').length > 0){
		var e = $('.card-description');

    	var table = $('.dt').DataTable({
	    	dom: 'Bfrtip',
	    	buttons: [
		        {
		            extend: 'print',
		            text: 'Print',
		            autoPrint: true,
		            exportOptions: {
		                columns: ':visible',
		            },
		            customize: function (win) {
		                $(win.document.body).find('table').addClass('display').css('font-size', '9px');
		                $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
		                    $(this).css('background-color','#D0D0D0');
		                });
		                $(win.document.body).find('h1').css('text-align','center');
		            }
		        }
		    ]
	    });

	    //show hide column list
	    for(n=0; n<table.columns()[0].length; n++){
	    	thAll = $(table.column(n).header());
	    	btnType = (table.column(n).visible()) ? 'btn-primary':'btn-default';
	    	e.append('<button class="toggle-vis btn btn-sm '+btnType+'" data-column="'+n+'" style="margin-bottom:4px;">'+thAll.text()+'</button> ');
	    }

	    $('.toggle-vis').click(function(e){
	    	e.preventDefault();
	    	elm = $(this);
	    	colIndex = elm.data('column');

	    	if(table.column(colIndex).visible()){
	    		elm.toggleClass('btn-primary btn-default');
	    	}else{
	    		elm.toggleClass('btn-default btn-primary');
	    	}

	    	var col = table.column(colIndex);
	    	col.visible(!col.visible());
	    });
    }

    //select2
    $('select').select2({
	    theme: 'bootstrap4',
	});

	//delete btn rule
	$('body').on('click', '.btn-del', function(){
		delBtn = $(this);

		if(confirm('Data akan dihapus, proses ini tidak dapat dikembalikan. lanjutkan?')){
			return true;
		}else{
			return false;
		}
	});

	$('body').on('click','.btn-add-link', function(e){
		e.preventDefault();
		url = $(this).data('url');
		link = $('.link');

		$.ajax({
			url : url,
			method : 'GET'
		}).done(function(data){
			link.append(data);
		});

	});

	$('body').on('click','.btn-del-link', function(e){
		e.preventDefault();

		$(this).closest('.row').remove();
	});	

	//auto dismiss alert msg
	if($('.alert').length > 0){
		setTimeout(function() {
			$('.alert').alert('close');
		}, 5000);
	}

	//del ss ajax func
	$('body').on('click', '.del-img', function(e){
		e.preventDefault();

		var element = $(this);
		var link = element.data('href');

		$.ajax({
			url: link,
			type: 'get',
			beforeSend: function()
			{
				element.text('Menghapus..');
				element.attr('disabled', true);
			},
			success: function(res)
			{
				alert(res.message);
				element.text('Hapus');
				element.attr('disabled', false);

				if(res.status){
					element.closest('.col-sm-2').remove();	
				}
			}
		});
	
	});
});