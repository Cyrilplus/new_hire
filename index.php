<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>New Hire List</title>

    <!-- Bootstrap -->
    <link href="lib/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="lib/load/css/normalize.css" /> -->
  	<!-- <link rel="stylesheet" type="text/css" href="lib/load/css/htmleaf-demo.css"> -->
    <link rel="stylesheet" type="text/css" href="lib/load/css/loaders.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
        .container {
            margin-top: 40px;
        }

        form input {
            margin-bottom: 10px;
        }
        #load{
          display: none;
          margin: auto;
          margin-top: 200px;
          vertical-align: middle;
        }
    </style>
</head>

<body>

    <div class="modal fade" id="add-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Administrator</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="add-new-hire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Hire</h4>
                </div>
                <form class="new-hire" action="" method="post">
                    <div class="modal-body">
                        <h4>Please fill the form&hellip;</h4>
                        <input type="text" name="method" value="add_new_hire" style="display:none;">
                        <input name='new_hire_id' type="text" class="form-control" placeholder="New Hire ID" aria-describedby="basic-addon1">
                        <input name='new_hire_name' type="text" class="form-control" placeholder="New Hire Name" aria-describedby="basic-addon1">
                        <input name='manager_id' type="text" class="form-control" placeholder="Manager ID" aria-describedby="basic-addon1">
                        <input name='manager_name' type="text" class="form-control" placeholder="Manager Name" aria-describedby="basic-addon1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="add-new-hire-btn">Add</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="container">
        <!-- Split button -->
        <h1 class='text-center'>New Hire List</h1>
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-danger">Set</button>
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#" data-toggle="modal" data-target="#add-admin">Add Administrator</a></li>
                <li><a href="#" data-toggle="modal" data-target="#add-new-hire">Add New Hire</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Display delete items</a></li>
            </ul>
        </div>
        <div data-loader="rectangle" id="load" ></div>
        <table class="table table-striped" id='table-new-hire'>
            <thead>
                <tr>
                    <th>Case ID</th>
                    <th>New Hire ID</th>
                    <th>New Hire Name</th>
                    <th>Manager ID</th>
                    <th>Manager Name</th>
                    <th>Created Time</th>
                    <th>Last(Day)</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.12.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="lib/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script src="js/site.js" charset="utf-8"></script>

</body>

</html>
