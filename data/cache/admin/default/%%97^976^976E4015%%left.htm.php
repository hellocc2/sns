<?php /* Smarty version 2.6.18, created on 2014-04-17 18:01:37
         compiled from left.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<style type="text/css">
.nav-collapse.collapse {
    overflow: visible !important;
}
.nav-collapse.collapse {
    overflow: visible;
}
</style>
<body class="page-header-fixed">

		<!-- BEGIN SIDEBAR -->

		<div class="page-sidebar nav-collapse collapse" >

			<!-- BEGIN SIDEBAR MENU -->        

			<ul class="page-sidebar-menu">

				<br />

				<li class="start" onclick="choosed(this)">

					<a href="?module=product&action=ProductManage" target="mainFrame">

					<i class="icon-home"></i> 

					<span class="title">商品管理</span>

					<span class="selected"></span>

					</a>

				</li>
                
                <li class="" onclick="choosed(this)">

					<a href="?module=blogger&action=BloggerManage" target="mainFrame">

					<i class="icon-list"></i> 

					<span class="title">用户管理</span>

					<span class="selected"></span>

					</a>

				</li>
                <li class="" onclick="choosed(this)">

					<a href="?module=choosed&action=ChoosedManage" target="mainFrame">

					<i class="icon-list"></i> 

					<span class="title">选择商品</span>

					<span class="selected"></span>

					</a>

				</li>
                <li class="" onclick="choosed(this)">

					<a href="?module=information&action=InformationManage" target="mainFrame">

					<i class="icon-list"></i> 

					<span class="title">信息管理</span>

					<span class="selected"></span>

					</a>

				</li>
                <li class="last" onclick="choosed(this)">

					<a href="?module=advertise&action=AdvertiseManage" target="mainFrame">

					<i class="icon-heart"></i> 

					<span class="title">广告管理</span>

					<span class="selected"></span>

					</a>

				</li>
                 <li class="last" onclick="choosed(this)">

					<a href="?module=task&action=TaskManage" target="mainFrame">

					<i class="icon-heart"></i> 

					<span class="title">任务设置</span>

					<span class="selected"></span>

					</a>

				</li>
                 <li class="last" onclick="choosed(this)">

					<a href="?module=step&action=StepManage" target="mainFrame">

					<i class="icon-heart"></i> 

					<span class="title">步骤设置</span>

					<span class="selected"></span>

					</a>

				</li>
                
                <!--<li class="">

					<a href="javascript:;">

					<i class="icon-map-marker"></i> 

					<span class="title">Maps</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="maps_google.html">

							Google Maps</a>

						</li>

						<li >

							<a href="maps_vector.html">

							Vector Maps</a>

						</li>

					</ul>

				</li>

				<li class="last ">

					<a href="charts.html">

					<i class="icon-bar-chart"></i> 

					<span class="title">Visual Charts</span>

					</a>

				</li>-->

			</ul>

			<!-- END SIDEBAR MENU -->

		</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
    $(function(){
        $('.start').addClass('active');
    });
    //选择项变色
    function choosed(obj){
        $(".active").removeClass('active');  
        $(obj).addClass('active'); 
    }
    
</script>
</body>
</html>
