<?php ob_start(ob_gzhandler); ?> 
<?php require_once('auth.php'); ?>
<?php if (isset($auth) && $auth) {?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="de_GWD">
  <meta name="author" content="JacyL4">

  <title>de_GWD - 概览</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.min.css" rel="stylesheet">
  <link href="css/bootstrap4-toggle.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">de_GWD</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item no-arrow mx-1">
        <a class="nav-link" href="/admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Pi-hole</span>
        </a>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>概览</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nodeman.php">
          <i class="fas fa-fw fa-stream"></i>
          <span>节点管理</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listbw.php">
          <i class="fas fa-fw fa-th-list"></i>
          <span>黑白名单</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="donate.php">
          <i class="fas fa-fw fa-yen-sign"></i>
          <span>捐赠</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php" onclick="logout()">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>注销</span></a>
      </li>
    </ul>
<script>
function logout () {
$.get("auth.php", {logout:"true"});
window.location.href="login.php"
}
</script>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">概览</a>
          </li>
          <li class="breadcrumb-item active">状态</li>
        </ol>

        <!-- Icon Cards -->
        <div class="row">

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-clock"></i>
                </div>
                <div class="mr-5">运行时长</div>
              </div>
              <a class="card-footer text-white clearfix small z-1">
                <span id="uptime" class="float-left">
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-rocket"></i>
                </div>
                <div class="mr-5">联网状态</div>
              </div>
              <a class="card-footer text-white clearfix small z-1">
                <span id="testbaidu" class="float-left">
                </span>
                <span id="testgoogle" class="float-right">
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-toggle-on"></i>
                </div>
                <div class="mr-5">代理开关</div>
              </div>
              <a class="card-footer text-white clearfix small z-1">
                <span class="float-left">
<input id="proxy-toggle" type="checkbox" data-toggle="toggle" data-on="代理中" data-off="已停止" data-onstyle="light" data-offstyle="dark" data-style="border" data-size="xs">
                </span>
                <span class="float-right">
<button type="button" class="btn btn-light btn-xs" onclick="proxyon()">ON</button>
<span>  -  </span>
<button type="button" class="btn btn-dark btn-xs" onclick="proxyoff()">OFF</button>
<script>
function proxyon () {
    $.get("proxyon.php");
}
function proxyoff () {
    $.get("proxyoff.php");
}
</script>
                </span>
              </a>
            </div>
          </div>
<script> 
function uptime() { 
$.get("uptime.php", function(data) { 
$("span#uptime").text(data);
})
};

function chlink1() { 
$.get("testbaidu.php", function(data) { 
$("span#testbaidu").text(data);
})
};

function chlink2() { 
$.get("testgoogle.php", function(data) { 
$("span#testgoogle").text(data);
})
};

function testproxy() { 
$.get("testproxy.php", function(data) {
    $('#proxy-toggle').bootstrapToggle(String(data));
})
};

window.onload = setInterval(function() {
uptime();
chlink1();
chlink2();
testproxy();
}, 1000)
</script>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-network-wired"></i>
                </div>
                <div class="mr-5">上级地址</div>
              </div>
              <a class="card-footer text-white clearfix small z-1">
                <span class="float-left">
<?php
echo shell_exec("route -n |  awk 'NR==3{print $2}'")
?>
                </span>
              </a>
            </div>
          </div>

        </div>



        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-stream"></i>
            节点列表</div><button type="button" class="btn btn-outline-success btn-sm" onclick="pingtest()">Ping</button>
<script>
function pingtest () {
$.get("ping1.php", function(data) { 
$("#ping1").html(data);
});

$.get("ping2.php", function(data) { 
$("#ping2").html(data);
});

$.get("ping3.php", function(data) { 
$("#ping3").html(data);
});

$.get("ping4.php", function(data) { 
$("#ping4").html(data);
});

$.get("ping5.php", function(data) { 
$("#ping5").html(data);
});

$.get("ping6.php", function(data) { 
$("#ping6").html(data);
});

$.get("ping7.php", function(data) { 
$("#ping7").html(data);
});

$.get("ping8.php", function(data) { 
$("#ping8").html(data);
});

$.get("ping9.php", function(data) { 
$("#ping9").html(data);
});
};
</script>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover text-center" id="dataTable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>节点名</th>
                    <th>域名</th>
                    <th>延迟(ms)</th>
                    <th>操作</th>
                    <th>状态</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/nodename.txt | awk 'NR==1{print}'"); ?></h6></td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/domain.txt | awk 'NR==1{print}'"); ?></h6></td>
                    <td><h6 id="ping1" class='mt-1 mb-n2 align-middle text-success'></h6></td>
                    <td><button type="button" class="btn btn-success btn-xs text-nowrap" onclick="switch1()">切换</button></td>
                    <td id="testnode1"></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/nodename.txt | awk 'NR==2{print}'"); ?></h6></td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/domain.txt | awk 'NR==2{print}'"); ?></h6></td>
                    <td><h6 id="ping2" class='mt-1 mb-n2 align-middle text-success'></h6></td>
                    <td><button type="button" class="btn btn-success btn-xs text-nowrap" onclick="switch2()">切换</button></td>
                    <td id="testnode2"></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/nodename.txt | awk 'NR==3{print}'"); ?></h6></td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/domain.txt | awk 'NR==3{print}'"); ?></h6></td>
                    <td><h6 id="ping3" class='mb-0 text-success'></h6></td>
                    <td><button type="button" class="btn btn-success btn-xs text-nowrap" onclick="switch3()">切换</button></td>
                    <td id="testnode3"></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/nodename.txt | awk 'NR==4{print}'"); ?></h6></td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/domain.txt | awk 'NR==4{print}'"); ?></h6></td>
                    <td><h6 id="ping4" class='mb-0 text-success'></h6></td>
                    <td><button type="button" class="btn btn-success btn-xs text-nowrap" onclick="switch4()">切换</button></td>
                    <td id="testnode4"></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/nodename.txt | awk 'NR==5{print}'"); ?></h6></td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/domain.txt | awk 'NR==5{print}'"); ?></h6></td>
                    <td><h6 id="ping5" class='mb-0 text-success'></h6></td>
                    <td><button type="button" class="btn btn-success btn-xs text-nowrap" onclick="switch5()">切换</button></td>
                    <td id="testnode5"></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/nodename.txt | awk 'NR==6{print}'"); ?></h6></td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/domain.txt | awk 'NR==6{print}'"); ?></h6></td>
                    <td><h6 id="ping6" class='mb-0 text-success'></h6></td>
                    <td><button type="button" class="btn btn-success btn-xs text-nowrap" onclick="switch6()">切换</button></td>
                    <td id="testnode6"></td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/nodename.txt | awk 'NR==7{print}'"); ?></h6></td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/domain.txt | awk 'NR==7{print}'"); ?></h6></td>
                    <td><h6 id="ping7" class='mb-0 text-success'></h6></td>
                    <td><button type="button" class="btn btn-success btn-xs text-nowrap" onclick="switch7()">切换</button></td>
                    <td id="testnode7"></td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/nodename.txt | awk 'NR==8{print}'"); ?></h6></td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/domain.txt | awk 'NR==8{print}'"); ?></h6></td>
                    <td><h6 id="ping8" class='mb-0 text-success'></h6></td>
                    <td><button type="button" class="btn btn-success btn-xs text-nowrap" onclick="switch8()">切换</button></td>
                    <td id="testnode8"></td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/nodename.txt | awk 'NR==9{print}'"); ?></h6></td>
                    <td><h6 class="mt-1 mb-n2 align-middle"><?php echo shell_exec("cat /var/www/html/domain.txt | awk 'NR==9{print}'"); ?></h6></td>
                    <td><h6 id="ping9" class='mb-0 text-success'></h6></td>
                    <td><button type="button" class="btn btn-success btn-xs text-nowrap" onclick="switch9()">切换</button></td>
                    <td id="testnode9"></td>
                  </tr>
                </tbody>
              </table>
<script> 
nodenum = "testnode<?php echo exec('/usr/local/bin/ui-testnode'); ?>" 
nodestatusf = "<h5 class='mb-0'><span class='badge badge-pill badge-secondary'>闲置</span></h5>"
nodestatust = "<h5 class='mb-0'><span class='badge badge-pill badge-success'>选中</span></h5>"
window.onload = function() {
$("#testnode1").html(nodestatusf);
$("#testnode2").html(nodestatusf);
$("#testnode3").html(nodestatusf);
$("#testnode4").html(nodestatusf);
$("#testnode5").html(nodestatusf);
$("#testnode6").html(nodestatusf);
$("#testnode7").html(nodestatusf);
$("#testnode8").html(nodestatusf);
$("#testnode9").html(nodestatusf);

$("#"+nodenum).html(nodestatust);
}

function switch1 () {
$("#testnode1").html(nodestatusf);
$("#testnode2").html(nodestatusf);
$("#testnode3").html(nodestatusf);
$("#testnode4").html(nodestatusf);
$("#testnode5").html(nodestatusf);
$("#testnode6").html(nodestatusf);
$("#testnode7").html(nodestatusf);
$("#testnode8").html(nodestatusf);
$("#testnode9").html(nodestatusf);
    $.get("changenode.php", {nodenum:"1"});
$("#testnode1").html(nodestatust);
}

function switch2 () {
$("#testnode1").html(nodestatusf);
$("#testnode2").html(nodestatusf);
$("#testnode3").html(nodestatusf);
$("#testnode4").html(nodestatusf);
$("#testnode5").html(nodestatusf);
$("#testnode6").html(nodestatusf);
$("#testnode7").html(nodestatusf);
$("#testnode8").html(nodestatusf);
$("#testnode9").html(nodestatusf);
    $.get("changenode.php", {nodenum:"2"});
$("#testnode2").html(nodestatust);
}

function switch3 () {
$("#testnode1").html(nodestatusf);
$("#testnode2").html(nodestatusf);
$("#testnode3").html(nodestatusf);
$("#testnode4").html(nodestatusf);
$("#testnode5").html(nodestatusf);
$("#testnode6").html(nodestatusf);
$("#testnode7").html(nodestatusf);
$("#testnode8").html(nodestatusf);
$("#testnode9").html(nodestatusf);
    $.get("changenode.php", {nodenum:"3"});
$("#testnode3").html(nodestatust);
}

function switch4 () {
$("#testnode1").html(nodestatusf);
$("#testnode2").html(nodestatusf);
$("#testnode3").html(nodestatusf);
$("#testnode4").html(nodestatusf);
$("#testnode5").html(nodestatusf);
$("#testnode6").html(nodestatusf);
$("#testnode7").html(nodestatusf);
$("#testnode8").html(nodestatusf);
$("#testnode9").html(nodestatusf);
    $.get("changenode.php", {nodenum:"4"});
$("#testnode4").html(nodestatust);
}

function switch5 () {
$("#testnode1").html(nodestatusf);
$("#testnode2").html(nodestatusf);
$("#testnode3").html(nodestatusf);
$("#testnode4").html(nodestatusf);
$("#testnode5").html(nodestatusf);
$("#testnode6").html(nodestatusf);
$("#testnode7").html(nodestatusf);
$("#testnode8").html(nodestatusf);
$("#testnode9").html(nodestatusf);
    $.get("changenode.php", {nodenum:"5"});
$("#testnode5").html(nodestatust);
}

function switch6 () {
$("#testnode1").html(nodestatusf);
$("#testnode2").html(nodestatusf);
$("#testnode3").html(nodestatusf);
$("#testnode4").html(nodestatusf);
$("#testnode5").html(nodestatusf);
$("#testnode6").html(nodestatusf);
$("#testnode7").html(nodestatusf);
$("#testnode8").html(nodestatusf);
$("#testnode9").html(nodestatusf);
    $.get("changenode.php", {nodenum:"6"});
$("#testnode6").html(nodestatust);
}

function switch7 () {
$("#testnode1").html(nodestatusf);
$("#testnode2").html(nodestatusf);
$("#testnode3").html(nodestatusf);
$("#testnode4").html(nodestatusf);
$("#testnode5").html(nodestatusf);
$("#testnode6").html(nodestatusf);
$("#testnode7").html(nodestatusf);
$("#testnode8").html(nodestatusf);
$("#testnode9").html(nodestatusf);
    $.get("changenode.php", {nodenum:"7"});
$("#testnode7").html(nodestatust);
}

function switch8 () {
$("#testnode1").html(nodestatusf);
$("#testnode2").html(nodestatusf);
$("#testnode3").html(nodestatusf);
$("#testnode4").html(nodestatusf);
$("#testnode5").html(nodestatusf);
$("#testnode6").html(nodestatusf);
$("#testnode7").html(nodestatusf);
$("#testnode8").html(nodestatusf);
$("#testnode9").html(nodestatusf);
    $.get("changenode.php", {nodenum:"8"});
$("#testnode8").html(nodestatust);
}

function switch9 () {
$("#testnode1").html(nodestatusf);
$("#testnode2").html(nodestatusf);
$("#testnode3").html(nodestatusf);
$("#testnode4").html(nodestatusf);
$("#testnode5").html(nodestatusf);
$("#testnode6").html(nodestatusf);
$("#testnode7").html(nodestatusf);
$("#testnode8").html(nodestatusf);
$("#testnode9").html(nodestatusf);
    $.get("changenode.php", {nodenum:"9"});
$("#testnode9").html(nodestatust);
};
</script>
            </div>
          </div>
        </div>

        <!-- DoH -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-bezier-curve"></i>
            Dns over Https</div>
          <div class="card-body">
<form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="DoH1" class="form-control" placeholder="DoH1" required="required" value="<?php echo shell_exec("awk -F'//' 'NR==14{print $2}' /etc/dns-over-https/doh-client.conf | cut -d'/' -f1"); ?>">
                  <label for="DoH1">DoH1</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="DoH2" class="form-control" placeholder="DoH2" required="required" value="<?php echo shell_exec("awk -F'//' 'NR==19{print $2}' /etc/dns-over-https/doh-client.conf | cut -d'/' -f1"); ?>">
                  <label for="DoH2">DoH2</label>
                </div>
              </div>
            </div>
          </div>
</form>

<span class="float-right">
<button id="submitdoh" type="button" class="btn btn-primary" onclick="submitdoh()">应用</button>
</span>

<script>
function submitdoh () {
dohtxt1=$("#DoH1").val();
dohtxt2=$("#DoH2").val();
$.get("changedoh.php", {DoH1:dohtxt1, DoH2:dohtxt2});
alert("DoH已提交");
}
</script>
          </div>
          </div>

        <!-- 静态地址 -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-exchange-alt"></i>
            静态地址</div>
          <div class="card-body">
<form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="localip" class="form-control" placeholder="本机地址" required="required" value="<?php echo shell_exec("ip -oneline -family inet address show |  awk '{print $4}' | awk 'END {print}' | cut -d '/' -f1"); ?>">
                  <label for="localip">本机地址</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="upstreamip" class="form-control" placeholder="上级地址" required="required" value="<?php echo shell_exec("route -n |  awk 'NR==3{print $2}'"); ?>">
                  <label for="upstreamip">上级地址</label>
                </div>
              </div>
            </div>
          </div>
</form>

<span class="float-right">
<button id="submitdoh" type="button" class="btn btn-primary" onclick="submitstaticip()">应用</button>
</span>

<script>
function submitstaticip () {
staticip1=$("#localip").val();
staticip2=$("#upstreamip").val();
$.get("changestaticip.php", {localip:staticip1, upstreamip:staticip2});
alert("静态地址已提交");
}
</script>
          </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © de_GWD by JacyL4 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <script src="js/bootstrap4-toggle.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- scripts for this page-->

</body>

</html>

<?php }?>
<?php  if(!$auth){ ?>
<?php header('Location: login.php');} ?>
<?php ob_end_flush(); ?> 