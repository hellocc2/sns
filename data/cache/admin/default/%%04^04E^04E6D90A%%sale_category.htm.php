<?php /* Smarty version 2.6.18, created on 2013-12-12 16:38:42
         compiled from sale_category.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'sale_category.htm', 105, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<style>

#rightnow ul li {float:left;margin-left:-1px;}
#rightnow ul li a {display:block;width:30px;height:30px;line-height:30px;text-align:center;border:1px solid #ddd;background-color:#f1f1f1;}
</style>
<body>
<script src="<?php echo $this->_tpl_vars['javascript_url']; ?>
amcharts.js" type="text/javascript"></script>
<div id="container">
	
	
	<div id="wrapper">
		<div id="content">
			<div id="rightnow">
                    <h3 class="reallynow">
                        <span>统计</span>
                          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "time_lang.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <br />
                    </h3>
				    
			  </div>  
			  <div id="rightnow">
                   
                          <div style="float:right;width:120px;clear:both;"> 
                          <ul>
							<li ><a href="?module=sale&action=category">日</a></li>
							<li><a href="?module=sale&action=category&time=week">周</a></li>
							<li><a href="?module=sale&action=category&time=month">月</a></li>
							</ul>
							</div>
                     <div style="clear:both;height:1px;overflow:hidden;"></div>
                    
				    
			  </div>
			
		<div id="infowrap">
              <div id="infobox">
              <p id="chartdiv" style="width:100%; height:550px;"></p>            
                  </div>
        </div>
			
		
			<div id="infowrap">
              <div id="infobox">
              <p id="chartdiv_1" style="width:100%; height:550px;"></p>            
                  </div>
        </div>
		
		<div id="infobox">
				<h3>品类销售分布</h3>
				<table border=1>
					<thead>
						<tr>
							<th>品类</th>
							<th>产品销售额（美金）</th>
							<th>订单数</th>
							<th>销售件数</th>
							<th>产品成本（美金）</th>
							<th>产品毛利率</th>
						</tr>
					</thead>
					<tbody>
					<tr align='center'>
						<td> 总计</td>
						<td> <?php echo $this->_tpl_vars['sell_wap']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['sell_num']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['sell_web']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['sell_suppliersprice']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['sell_Maori']; ?>
%</td>
						
					</tr>
					<?php $_from = $this->_tpl_vars['category_sell']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['cat']):
?> 
					<tr align='center'>
						<td> <a href="?module=Sale&action=category&id=<?php echo $this->_tpl_vars['cat']['category_code']; ?>
&level=<?php echo $this->_tpl_vars['cat']['level']; ?>
"><?php echo $this->_tpl_vars['cat']['category_name']; ?>
</a></td>
						<td> <?php echo $this->_tpl_vars['cat']['ProductsPrice']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['cat']['OrderNum']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['cat']['ProductsNum']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['cat']['SuppliersPrice']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['cat']['Maori']; ?>
%</td>
					</tr> 
							<?php endforeach; endif; unset($_from); ?>
					
					</tbody>
				</table>
			</div> 
		</div>
	</div>
</div>
<!--本月分析（天）-->
<script>
var averagenum = 30;
var chart;
var chartData_1 = [
      			<?php $_from = $this->_tpl_vars['sell_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>            
                     {
              	   "date":"<?php echo $this->_tpl_vars['list']['date']; ?>
",
              	   //"url":"?module=Conversion&action=hourrate&date=<?php echo $this->_tpl_vars['list']['time']; ?>
",
              		<?php $_from = $this->_tpl_vars['list']['sell']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['sell']):
?>
              	   	"ProductsPrice<?php echo $this->_tpl_vars['k']; ?>
":"<?php echo $this->_tpl_vars['sell']['ProductsPrice']; ?>
",
              	   "ProductsNum<?php echo $this->_tpl_vars['k']; ?>
":"<?php echo $this->_tpl_vars['sell']['ProductsNum']; ?>
",
              	  	
              	  <?php endforeach; endif; unset($_from); ?>
              	   },
              	   <?php endforeach; endif; unset($_from); ?>];
var allnum="<?php echo count($this->_tpl_vars['sell_list']); ?>
";
var color=['#FF9E01','#CC0000','#00BBCC','#69A55C','#DADADA','#2E7824','#000000']
//var chartData_1 =[{"ip":"112","newUv":"36","pv":"210","uv":"43","time":"13:12"},{"ip":"97","newUv":"28","pv":"189","uv":"30","time":"13:13"},{"ip":"99","newUv":"31","pv":"189","uv":"33","time":"13:14"},{"ip":"103","newUv":"49","pv":"209","uv":"51","time":"13:15"},{"ip":"102","newUv":"36","pv":"203","uv":"41","time":"13:16"},{"ip":"97","newUv":"29","pv":"172","uv":"32","time":"13:17"},{"ip":"109","newUv":"37","pv":"202","uv":"43","time":"13:18"},{"ip":"107","newUv":"37","pv":"188","uv":"40","time":"13:19"},{"ip":"107","newUv":"44","pv":"234","uv":"48","time":"13:20"},{"ip":"119","newUv":"56","pv":"233","uv":"63","time":"13:21"},{"ip":"91","newUv":"34","pv":"178","uv":"43","time":"13:22"},{"ip":"114","newUv":"60","pv":"204","uv":"65","time":"13:23"},{"ip":"115","newUv":"65","pv":"230","uv":"68","time":"13:24"},{"ip":"101","newUv":"45","pv":"189","uv":"46","time":"13:25"},{"ip":"104","newUv":"53","pv":"226","uv":"57","time":"13:26"}];
var average ='4';
AmCharts.ready(function () {

	// SERIAL CHART    
	chart = new AmCharts.AmSerialChart();
	//chart.pathToImages = "../amcharts/images/";
	chart.pathToImages = "http://www.amcharts.com/lib/images/";
	chart.zoomOutButton = {
		backgroundColor: '#000000',
		backgroundAlpha: 0.15
	};
	chart.backgroundColor= '#FFFFFF';
	chart.backgroundAlpha= 0.95;
	chart.dataProvider = chartData_1;
	chart.categoryField = "date";
	//chart.addTitle("数据分析（小时）", 15);
	// AXES
	// category
	var categoryAxis = chart.categoryAxis;
	categoryAxis.labelRotation = 45;
	categoryAxis.dashLength = 1;
	categoryAxis.gridAlpha = 0.15;
	categoryAxis.axisColor = "#DADADA";

	// value                
	var valueAxis = new AmCharts.ValueAxis();
	valueAxis.axisColor = "#DADADA";
	valueAxis.dashLength = 1;
   // valueAxis.logarithmic = true; // this line makes axis logarithmic
	chart.addValueAxis(valueAxis);

	
	// GRAPH 2
	<?php $_from = $this->_tpl_vars['category_sell']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['cat']):
        $this->_foreach['foo']['iteration']++;
?>        
	var graph = new AmCharts.AmGraph();
	graph.type = "smoothedLine";
	graph.bulletSize = 7;
	if(allnum<averagenum){
 	graph.bullet = "round";
	}
	graph.balloonText = "<?php echo $this->_tpl_vars['cat']['category_name']; ?>
 : [[ProductsPrice<?php echo $this->_tpl_vars['key']; ?>
]]";
	graph.title = "<?php echo $this->_tpl_vars['cat']['category_name']; ?>
";
	graph.valueField = "ProductsPrice<?php echo $this->_tpl_vars['key']; ?>
";
	graph.lineThickness = 2;
	graph.lineColor = color[<?php echo ($this->_foreach['foo']['iteration']-1); ?>
];
	//<?php echo ($this->_foreach['foo']['iteration']-1); ?>

	chart.addGraph(graph);
	<?php endforeach; endif; unset($_from); ?>
				
	// CURSOR
	var chartCursor = new AmCharts.ChartCursor();
	chartCursor.cursorPosition = "mouse";
	chart.addChartCursor(chartCursor);

	// SCROLLBAR
	var chartScrollbar = new AmCharts.ChartScrollbar();
	chart.addChartScrollbar(chartScrollbar);
		
	 // LEGEND
	var legend = new AmCharts.AmLegend();
	legend.markerType = "circle";
	chart.addLegend(legend);
	// WRITE
	chart.write("chartdiv");
		
	});   

</script>
 <script type="text/javascript">
            var chart;

            var chartData = [
		<?php $_from = $this->_tpl_vars['category_sell']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['cat']):
?> 
		 {
        	   "category_name":"<?php echo $this->_tpl_vars['cat']['category_name']; ?>
",
        	   "ProductsPrice":"<?php echo $this->_tpl_vars['cat']['ProductsPrice']; ?>
",
        	   "url":"?module=Sale&action=category&id=<?php echo $this->_tpl_vars['cat']['category_code']; ?>
&level=<?php echo $this->_tpl_vars['cat']['level']; ?>
",
        		
        	   },
            <?php endforeach; endif; unset($_from); ?>
            ];


            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();

                // title of the chart
                chart.addTitle("品类销售", 16);

                chart.dataProvider = chartData;
                chart.titleField = "category_name";
                chart.valueField = "ProductsPrice";
                //chart.urlField = "url";
                chart.sequencedAnimation = true;
                chart.startEffect = "elastic";
                chart.innerRadius = "30%";
                chart.startDuration = 2;
                chart.labelRadius = 15;

                // the following two lines makes the chart 3D
                chart.depth3D = 10;
                chart.angle = 15;

                // WRITE                                 
                chart.write("chartdiv_1");
            });
        </script>
</body>

</html>