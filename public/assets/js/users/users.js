////////////////////////////////////////USERS///////////////////////////////////////////////////
//show modal for add new group
$('#myModalShowUser').on('click', function (){
	
	/*$.ajax
		({
			url: 'getallactions',
			type: "get",
			data:{},
	  		success: function(data)
			{
				if (data != 0)
				{
					obj = jQuery.parseJSON(data);
					var x = 1;
					for (i in obj)
					{
						content = '<input type="checkbox" value="'+obj[i].id+'">'+obj[i].title+'<br/>';
						$('#actionList').append(content);
					}
				}
				else
				{
					$('#actionList').text('There are no actions yet.');
				}
			}
		});*/
		$('#myModalUser').modal('show');
	
});

////////////////////////////////////////GROUPS///////////////////////////////////////////////////
//show modal for add new group
$('#myModalShowGroup').on('click', function (){
	$('#actionList').empty();
	$('#actionListEdit').empty();
	$('#actionListAll').empty();
	$.ajax
		({
			url: 'getallactions',
			type: "get",
			data:{},
	  		success: function(data)
			{
				if (data != 0)
				{
					obj = jQuery.parseJSON(data);
					var x = 1;
					for (i in obj)
					{
						content = '<input type="checkbox" value="'+obj[i].id+'">'+obj[i].title+'<br/>';
						$('#actionList').append(content);
					}
				}
				else
				{
					$('#actionList').text('There are no actions yet.');
				}
			}
		});
		$('#myModalGroup').modal('show');
	
});

//add new group/validate
$('#addGroup').on('click', function(){
	if ($('#namNewGroup').val() == '')
	{
		$('#dangerGroup').show();
		$('#dangerGroup').fadeToggle(3000);
		return false;
	}
	var actions = [];
	$('input:checked').each(function() {actions.push($(this).val());});
	
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.ajax
		({
			url: 'newgroup',
			type: "post",
			data:{newname:$('#namNewGroup').val(), actions:actions},
	  		success: function(data)
			{
				if (data == 1)
				{
					$('#myModalGroup').modal('hide');
					$('#actionList').empty();
					window.location.href = 'allgroups';
				}
				else
				{
					alert('When saving  - fails!');
				}	
			}
		});
});

//////////////////////////////////////EDIT GROUP///////////////////////////////////////////
//show modal for edit group
function showModalEditGroup(name, id)
{
	$('#actionListEdit').empty();
	$('#actionListAll').empty();
	$('#namIdGroup').attr("value", id);
	$('#namNewGroupE').attr("value", name);
	$('#myModalLabelgr').text(name);
	
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.ajax
		({
			url: 'getactionsgroup',
			type: "post",
			data:{id:id},
	  		success: function(data)
			{
				if (data.length != 0)
				{
					obj = jQuery.parseJSON(data);
					if (obj.isset_actions.length != 0)
					{
						for (i in obj.isset_actions)
						{							
							content = '<input type="checkbox" value="'+obj.isset_actions[i].id+'" checked>'+
							'<span>'+obj.isset_actions[i].title+'</span><br/>';
							$('#actionListEdit').append(content);
						}
					}
					
					if (obj.free_actions.length != 0)
					{
						for (i in obj.free_actions)
						{
							contents = '<input type="checkbox" value="'+obj.free_actions[i].id+'">'+
							'<span>'+obj.free_actions[i].title+'</span><br/>';
							$('#actionListAll').append(contents);
						}
					}
				}
			}
		});
	$('#myModalEditGroup').modal('show');
};


//save edit group
$('#saveGroupEdit').on('click', function(){
	if ($('#namNewGroupE').val() == '')
	{
		$('#dangerGroupg').show();
		$('#dangerGroupg').fadeToggle(3000);
		return false;
	}
	var actions = [];
	$('#actionListEdit input:checked').each(function() {actions.push($(this).val());});
	
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.ajax
		({
			url: 'editgroup',
			type: "post",
			data:{id:$('#namIdGroup').val(), newname:$('#namNewGroupE').val(), actions:actions},
	  		success: function(data)
			{
				if (data == 1)
				{
					$('#myModalEditGroup').modal('hide');
					$('#actionListEdit').empty();
					$('#actionListAll').empty();
					window.location.href = 'allgroups';
				}
				else
				{
					$('#myModalEditGroup').modal('hide');
					$('#actionListEdit').empty();
					$('#actionListAll').empty();
					alert('When saving  - fails!');
				}	
			}
		});
});
//add/delete group for user
$('#actionListEdit').on('change', 'input', function(){
	content = '<input type="checkbox" value="'+$(this).attr('value')+'">'+
						'<span>'+$(this).next('span').text()+'</span><br/>';
	$('#actionListAll').append(content);
	$(this).next('span').next('br').remove();
	$(this).next('span').remove();
	$(this).remove();
});

$('#actionListAll').on('change', 'input', function(){
	content = '<input type="checkbox" value="'+$(this).attr('value')+'" checked>'+
						'<span>'+$(this).next('span').text()+'</span><br/>';
	$('#actionListEdit').append(content);
	$(this).next('span').next('br').remove();
	$(this).next('span').remove();
	$(this).remove();
});
///////////////////////////////////MENU/////////////////////////////////////////////////////
//show modal for add new menu
$('#myModalShowMenu').on('click', function (){
	$('#myModalMenu').modal('show');
});


//add new menu/validate
$('#addMenu').on('click', function(){
	if (($('#namNewMenu').val() == '') || ($('#urlNewMenu').val() == ''))
	{
		$('#dangerGroupm').show();
		$('#dangerGroupm').fadeToggle(3000);
		return false;
	}
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	var is_active = 0;
	if ($("#isActive").prop("checked"))
	{
		is_active = 1;
	}
	$.ajax
		({
			url: 'newmenu',
			type: "post",
			data:{newname:$('#namNewMenu').val(), url:$('#urlNewMenu').val(), is_active:is_active},
	  		success: function(data)
			{
				if (data)
				{
					$('#myModalMenu').modal('hide');
					window.location.href = 'allmenu';
				}
				else
				{
					alert('When saving  - fails!');
				}	
			}
		});
});

//////////////////////////////////////EDIT MENU///////////////////////////////////////////
//show modal for edit menu
function showModalEditMenu(url, name, id, url_href, is_active)
{
	$('#myModalEditMenu').modal('show');
	$('#namIdMenu').attr("value", id);
	$('#namNewMenuE').attr("value", name);
	$('#namUrlMenu').attr("value", url);
	$('#namUrlHrefMenu').attr("value", url_href);
	if (is_active == 1)
	{
		$('#isActiveEdit').attr('checked', 'checked');
	}
};

//save edit data menu
$('#saveMenuEdit').on('click', function(){
	if ($('#namNewMenuE').val() == '')
	{
		$('#dangerGroupe').show();
		$('#dangerGroupe').fadeToggle(3000);
		return false;
	}
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	var is_active = 0;
	if ($("#isActiveEdit").prop("checked"))
	{
		is_active = 1;
	}
	$.ajax
		({
			url: $('#namUrlMenu').val(),
			type: "post",
			data:{newname:$('#namNewMenuE').val(), id:$('#namIdMenu').val(), is_active:is_active},
	  		success: function(data)
			{
				if (data == 1)
				{
					$('#myModalEditMenu').modal('hide');
					window.location.href = $('#namUrlHrefMenu').val();
				}
				else
				{
					alert('When saving  - fails!');
				}	
			}
		});
});

///////////////////////////////////ACTIONS/////////////////////////////////////////////////////
//show modal for add new action
$('#myModalShowAction').on('click', function (){
	$('#myModalAction').modal('show');
});


//add new actions/validate
$('#addAction').on('click', function(){
	if ($('#namNewAction').val() == '')
	{
		$('#dangerGroupa').show();
		$('#dangerGroupa').fadeToggle(3000);
		return false;
	}
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.ajax
		({
			url: 'newaction',
			type: "post",
			data:{newname:$('#namNewAction').val()},
	  		success: function(data)
			{
				if (data == 1)
				{
					$('#myModalMenu').modal('hide');
					window.location.href = 'allactions';
				}
				else
				{
					alert('When saving  - fails!');
				}	
			}
		});
});

//////////////////////////////////////EDIT ACTION///////////////////////////////////////////
//show modal for edit
function showModalEdit(url, name, id, title, url_href)
{
	$('#myModalEdit').modal('show');
	$('#myModalLabelsE').text('Edit '+title+' - '+name);
	$('#namId').attr("value", id);
	$('#namNew').attr("value", name);
	$('#namUrl').attr("value", url);
	$('#namUrlHref').attr("value", url_href);
};

//save edit data
$('#saveChanges').on('click', function(){
	if ($('#namNew').val() == '')
	{
		$('#dangerGroupe').show();
		$('#dangerGroupe').fadeToggle(3000);
		$('#namNew').attr("value", '');
		return false;
	}
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
	$.ajax
		({
			url: $('#namUrl').val(),
			type: "post",
			data:{newname:$('#namNew').val(), id:$('#namId').val()},
	  		success: function(data)
			{
				if (data == 1)
				{
					$('#myModalEdit').modal('hide');
					window.location.href = $('#namUrlHref').val();
				}
				else
				{
					alert('When saving  - fails!');
				}	
			}
		});
});

//////////////////////////////////////DELETE GROUP/MENU/ACTION///////////////////////////////////////////
//show modal for delete 
function showModalDelete(url, name, title, id)
{
	$('#actionDenger').text('');
	$('#goDelete').show();
	if (title == 'action')
	{
		$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    	});
		$.ajax
		({
			url: 'getmenu',
			type: "post",
			data:{action_id:id},
	  		success: function(data)
			{
				if (data != 0)
				{
					$('#actionDenger').text(data);
					$('#myModalLabels').text('Deleted '+title+' '+name);
					$('#myModalDelete').find('.text-danger').text('');
					//$('#goDelete').attr("href", url);
					$('#goDelete').hide();
					$('#myModalDelete').modal('show');
				}
				else
				{
					$('#myModalDelete').find('.text-danger').text('You really want to delete '+title+' '+name+'?');
					$('#myModalLabels').text('Deleted '+title+' '+name);
					$('#goDelete').attr("href", url);
					$('#goDelete').show();
					$('#myModalDelete').modal('show');
				}
			}
		});
	}
	else if (title == 'group')
	{
		$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    	});
		$.ajax
		({
			url: 'getusers',
			type: "post",
			data:{group_id:id},
	  		success: function(data)
			{
				if (data != 0)
				{
					$('#actionDenger').text(data);
					$('#myModalLabels').text('Deleted '+title+' '+name);
					$('#myModalDelete').find('.text-danger').text('');
					//$('#goDelete').attr("href", url);
					$('#goDelete').hide();
					$('#myModalDelete').modal('show');
				}
				else
				{
					$('#myModalDelete').find('.text-danger').text('You really want to delete '+title+' '+name+'?');
					$('#myModalLabels').text('Deleted '+title+' '+name);
					$('#goDelete').attr("href", url);
					$('#goDelete').show();
					$('#myModalDelete').modal('show');
				}
			}
		});
	}
	else
	{
		$('#myModalDelete').find('.text-danger').text('You really want to delete '+title+' '+name+'?');
		$('#myModalLabels').text('Deleted '+title+' '+name);
		$('#goDelete').attr("href", url);
		$('#myModalDelete').modal('show');
	}	
};