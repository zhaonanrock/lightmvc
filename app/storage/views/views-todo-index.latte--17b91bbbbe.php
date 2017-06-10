<?php
// source: D:\phpStudy\mysite\app/views/todo/index.latte

use Latte\Runtime as LR;

class Template17b91bbbbe extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<!DOCUMENT>
<head>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container-fluid">
  <div class="page-header">
    <h1>Zhao Nan's Todo ...</h1>
  </div>
  <div class="row col-md-6">
        <div class="input-group">
              <input type="text" class="form-control" placeholder="填写Todo...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">添加</button>
              </span>
        </div>
  </div>
  <br><br><br>
  <div class="row col-md-8">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>STATUS</th>
            <th>OPERATION</th>
        </tr>
<?php
		$iterations = 0;
		foreach ($todos as $todo) {
?>
        <tr>
            <td><?php echo LR\Filters::escapeHtmlText($todo['id']) /* line 38 */ ?></td>
            <td><?php echo LR\Filters::escapeHtmlText($todo['title']) /* line 39 */ ?></td>
            <td><?php echo LR\Filters::escapeHtmlText($todo['status']) /* line 40 */ ?></td>
            <td>
                <button type='button' attr='<?php echo LR\Filters::escapeHtmlAttr($todo['id']) /* line 42 */ ?>' class='btn btn-success'>完成</button>
                <button type='button' attr='<?php echo LR\Filters::escapeHtmlAttr($todo['id']) /* line 43 */ ?>' class='btn btn-danger'>删除</button>
            </td>
        </tr>
<?php
			$iterations++;
		}
?>
    </table>
    </div>
    </div>
</body>

<script>
$('.btn-danger').click(function(){
    var id = $(this).attr('attr');
    alert(id);
    jQuery.ajax({
        type:'GET',
        url:'http://localhost:84/todo/destroy/'+id,
        success:function(){
            alert("Delete Success");
            window.location.reload();
        }
    });
});
</script><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['todo'])) trigger_error('Variable $todo overwritten in foreach on line 36');
		
	}

}
