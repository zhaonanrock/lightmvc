<!DOCUMENT>
<head>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="index.js"}></script>
</head>
<body>
<div class="container-fluid">
  <div class="page-header">
    <h1>Zhao Nan's Todo ...</h1>
  </div>
  <div class="row col-md-6">
    <form name="form1" action="store" method="post">
        <div class="input-group">
              <input type="text" name="title" id="title" class="form-control" placeholder="填写Todo...">
              <span class="input-group-btn">
                 <button class="btn btn-primary" type="submit">添加</button>
              </span>
        </div>
    </form>
  </div>
  <br><br><br>
  <div class="row col-md-8">
    <table class="table table-bordered">
        <tr>
            <th class="text-center col-md-1">ID</th>
            <th class="text-center col-md-5">TITLE</th>
            <th class="text-center col-md-1">STATUS</th>
            <th class="text-center col-md-1">OPERATION</th>
        </tr>
        {foreach $todos as $todo}
        <tr>
            <td class="text-center col-md-1">{$todo['id']}</td>
            <td class="text-left col-md-5">{$todo['title']}</td>
            <td class="text-center col-md-1">{$todo['status'] ? "已完成":"待处理"}</td>
            <td class="text-center col-md-1">
                <button type='button' attr='{$todo['id']}' class='btn btn-success'>完成</button>
                <button type='button' attr='{$todo['id']}' class='btn btn-danger'>删除</button>
            </td>
        </tr>
        {/foreach}
    </table>
    </div>
    </div>
</body>
