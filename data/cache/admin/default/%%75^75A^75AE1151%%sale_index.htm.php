<?php /* Smarty version 2.6.18, created on 2013-12-12 16:39:00
         compiled from sale_index.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'sale_index.htm', 53, false),array('modifier', 'string_format', 'sale_index.htm', 332, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="<?php echo $this->_tpl_vars['javascript_url']; ?>
amcharts.js" type="text/javascript"></script>
<style>

#rightnow ul li {float:left;margin-left:-1px;}
#rightnow ul li a {display:block;width:30px;height:30px;line-height:30px;text-align:center;border:1px solid #ddd;background-color:#f1f1f1;}
</style>
<body>
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
							<li ><a href="?module=sale&action=index">日</a></li>
							<li><a href="?module=sale&action=index&time=week">周</a></li>
							<li><a href="?module=sale&action=index&time=month">月</a></li>
							</ul>
							</div>
                     <div style="clear:both;height:1px;overflow:hidden;"></div>
                    
				    
			  </div>
              <div id="infowrap">
              <div id="infobox">
           <script type="text/javascript">
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
                         	   	"OrdersAmount<?php echo $this->_tpl_vars['k']; ?>
":"<?php echo $this->_tpl_vars['sell']['OrdersAmount']; ?>
",
                         	   "ProductAmount<?php echo $this->_tpl_vars['k']; ?>
":"<?php echo $this->_tpl_vars['sell']['ProductAmount']; ?>
",
                         	  	"LogisticsAmount<?php echo $this->_tpl_vars['k']; ?>
":"<?php echo $this->_tpl_vars['sell']['LogisticsAmount']; ?>
",
                         	 	"OrderNum<?php echo $this->_tpl_vars['k']; ?>
":"<?php echo $this->_tpl_vars['sell']['OrderNum']; ?>
",
                         	  <?php endforeach; endif; unset($_from); ?>
                         	   },
                         	   <?php endforeach; endif; unset($_from); ?>];
           var allnum="<?php echo count($this->_tpl_vars['sell_list']); ?>
";
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

           	// GRAPH 1
           	var graph = new AmCharts.AmGraph();
           	graph.type = "smoothedLine";
           	graph.bulletSize = 7;
           	if(allnum<averagenum){
            	graph.bullet = "round";
           	}
           	graph.balloonText = "WAP销售额 : [[OrdersAmount2]]";
           	graph.title = "WAP销售额";
           	graph.valueField = "OrdersAmount2";
           	graph.lineThickness = 2;
           	graph.lineColor = "#CC0000";
           	chart.addGraph(graph);
           				
           	// GRAPH 2
           	var graph = new AmCharts.AmGraph();
           	graph.type = "smoothedLine";
           	graph.bulletSize = 7;
           	if(allnum<averagenum){
            	graph.bullet = "round";
           	}
           	graph.balloonText = "IOS销售额 : [[OrdersAmount3]]";
           	graph.title = "IOS销售额";
           	graph.valueField = "OrdersAmount3";
           	graph.lineThickness = 2;
           	graph.lineColor = "#2E7824";
           	chart.addGraph(graph);
           	
           	// GRAPH 3
           	var graph = new AmCharts.AmGraph();
           	graph.type = "smoothedLine";
           	graph.bulletSize = 7;
           	if(allnum<averagenum){
            	graph.bullet = "round";
           	}
           	graph.balloonText = "WAP订单数 : [[OrderNum2]]";
           	graph.title = "WAP订单数";
           	graph.valueField = "OrderNum2";
           	graph.lineThickness = 2;
           	graph.lineColor = "#FF9E01";
           	chart.addGraph(graph);
           	
           	// GRAPH 4
           	var graph = new AmCharts.AmGraph();
           	graph.type = "smoothedLine";
           	graph.bulletSize = 7;
           	if(allnum<averagenum){
            	graph.bullet = "round";
           	}
           	graph.balloonText = "Android销售额 : [[OrdersAmount4]]";
           	graph.title = "Android销售额";
           	graph.valueField = "OrdersAmount4";
           	graph.lineThickness = 2;
           	graph.lineColor = "#69A55C";
           	chart.addGraph(graph);
           	
         	// GRAPH 5
           	var graph = new AmCharts.AmGraph();
           	graph.type = "smoothedLine";
           	graph.bulletSize = 7;
           	if(allnum<averagenum){
            	graph.bullet = "round";
           	}
           	graph.balloonText = "WAP商品销售额 : [[ProductAmount2]]";
           	graph.title = "WAP商品销售额";
           	graph.valueField = "ProductAmount2";
           	graph.lineThickness = 2;
           	graph.lineColor = "#00BBCC";
           	chart.addGraph(graph);
           				
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
                    <p id="chartdiv" style="width:100%; height:350px;"></p>            
                  </div>
                  <div id="infobox" class="margin-left">
            <script type="text/javascript">
            var chart;
            var chartData = [
                    			<?php $_from = $this->_tpl_vars['sell_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>            
                                   {
                            	   "year":"<?php echo $this->_tpl_vars['list']['date']; ?>
",
                            	   //"url":"?module=Conversion&action=hourrate&date=<?php echo $this->_tpl_vars['list']['time']; ?>
",
                            		"wap":"<?php echo $this->_tpl_vars['list']['sell_amount_wap']; ?>
",
                            		"web":"<?php echo $this->_tpl_vars['list']['sell_amount_web']; ?>
",
                            		"wap_rate":"<?php echo $this->_tpl_vars['list']['wap_rate']; ?>
",
                            	   },
                            	   <?php endforeach; endif; unset($_from); ?>];
          
            /*AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.pathToImages = "../amcharts/images/";
                chart.zoomOutButton = {
                    backgroundColor: "#000000",
                    backgroundAlpha: 0.15
                };
                chart.dataProvider = chartData;
                chart.categoryField = "year";

                chart.addTitle("销售占比", 15);

                // AXES
                // Category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0.07;
                categoryAxis.axisColor = "#DADADA";
                categoryAxis.startOnAxis = true;

                // Value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.title = "percent"; // this line makes the chart "stacked"
                valueAxis.stackType = "100%";
                valueAxis.gridAlpha = 0.07;
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph = new AmCharts.AmGraph();
                graph.type = "line"; // it's simple line graph
                graph.title = "wap";
                graph.valueField = "wap";
                graph.balloonText = "[[value]] ([[percents]]%)";
                graph.lineAlpha = 0;
                graph.fillAlphas = 0.6; // setting fillAlphas to > 0 value makes it area graph 
                chart.addGraph(graph);

                // second graph
                var graph = new AmCharts.AmGraph();
                graph.type = "line";
                graph.title = "web";
                graph.valueField = "web";
                graph.balloonText = "[[value]] ([[percents]]%)";
                graph.lineAlpha = 0;
                graph.fillAlphas = 0.6;
                chart.addGraph(graph);

                // LEGEND
                var legend = new AmCharts.AmLegend();
                legend.align = "center";
                chart.addLegend(legend);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.zoomable = false; // as the chart displayes not too many values, we disabled zooming
                chartCursor.cursorAlpha = 0;
                chart.addChartCursor(chartCursor);
				*/
				
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
		           	chart.dataProvider = chartData;
		           	chart.categoryField = "year";
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

		           	// GRAPH 1
		           	var graph = new AmCharts.AmGraph();
		           	graph.type = "smoothedLine";
		           	graph.bulletSize = 7;
		           	if(allnum<averagenum){
		            	graph.bullet = "round";
		           	}
		           	graph.balloonText = "WAP销售占比 : [[wap_rate]]%";
		           	graph.title = "WAP销售占比";
		           	graph.valueField = "wap_rate";
		           	graph.lineThickness = 2;
		           	graph.lineColor = "#00BBCC";
		           	chart.addGraph(graph);
		           	
		           	
		         // CURSOR
		           	var chartCursor = new AmCharts.ChartCursor();
		           	chartCursor.cursorPosition = "mouse";
		           	chart.addChartCursor(chartCursor);

		           	// SCROLLBAR
		           	var chartScrollbar = new AmCharts.ChartScrollbar();
		           	chart.addChartScrollbar(chartScrollbar);
		           	
                // WRITE
                chart.write("chartdiv2");
            });
        </script>
                    <p id="chartdiv2" style="width: 100%; height: 350px;"></p>  
                  </div>
                 <div id="infobox">
				<h3>访问量分布</h3>
				<table border=1>
					<thead>
						<tr>
							<th></th>
							<th>移动销售额（万美金）</th>
							<th>移动订单数</th>
							<th>移动客单价</th>
							<th>总销售额（万美金）</th>
							<th>WEB销售额（万美金）</th>
							<th>WEB订单数</th>
							<th>WEB客单价</th>
							<th>移动比例</th>
							
						</tr>
					</thead>
					<tbody>
					<tr align='center'>
						<td> 总计</td>
						<td> <?php echo $this->_tpl_vars['sell_wap']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['sell_num']; ?>
</td>
						<td> <?php echo ((is_array($_tmp=$this->_tpl_vars['sell_wap']/$this->_tpl_vars['sell_num'])) ? $this->_run_mod_handler('string_format', true, $_tmp, '%.2f') : smarty_modifier_string_format($_tmp, '%.2f')); ?>
</td>
						<td> <?php echo $this->_tpl_vars['sell_wap']+$this->_tpl_vars['sell_web']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['sell_web']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['sell_web_num']; ?>
</td>
						<td> <?php echo ((is_array($_tmp=$this->_tpl_vars['sell_web']/$this->_tpl_vars['sell_web_num'])) ? $this->_run_mod_handler('string_format', true, $_tmp, '%.2f') : smarty_modifier_string_format($_tmp, '%.2f')); ?>
</td>
						<td> <?php echo $this->_tpl_vars['sell_rate']; ?>
%</td>
					</tr>
					<?php $_from = $this->_tpl_vars['sell_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>            
                     <tr align='center'>
						<td> <?php echo $this->_tpl_vars['list']['date']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['list']['sell_amount_wap']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['list']['sell_num_wap']; ?>
</td>
						<td> <?php echo ((is_array($_tmp=$this->_tpl_vars['list']['sell_amount_wap']/$this->_tpl_vars['list']['sell_num_wap'])) ? $this->_run_mod_handler('string_format', true, $_tmp, '%.2f') : smarty_modifier_string_format($_tmp, '%.2f')); ?>
</td>
						<td> <?php echo $this->_tpl_vars['list']['sell_amount_wap']+$this->_tpl_vars['list']['sell_amount_web']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['list']['sell_amount_web']; ?>
</td>
						<td> <?php echo $this->_tpl_vars['list']['sell_num_web']; ?>
</td>
						<td> <?php echo ((is_array($_tmp=$this->_tpl_vars['list']['sell_amount_web']/$this->_tpl_vars['list']['sell_num_web'])) ? $this->_run_mod_handler('string_format', true, $_tmp, '%.2f') : smarty_modifier_string_format($_tmp, '%.2f')); ?>
</td>
						<td> <?php echo $this->_tpl_vars['list']['wap_rate']; ?>
%</td>
						
					</tr> 
                    <?php endforeach; endif; unset($_from); ?>
				
					</tbody>
				</table>
			</div> 
                 
                  
              </div>
            </div>
            
      </div>
        
</div>
</body>

</html>