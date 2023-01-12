!function(d){"use strict";function r(){}r.prototype.respChart=function(r,o,e,a){Chart.defaults.global.defaultFontColor="#8791af",Chart.defaults.scale.gridLines.color="rgba(108, 120, 151, 0.1)";var t=r.get(0).getContext("2d"),n=d(r).parent();function i(){r.attr("width",d(n).width());switch(o){case"Line":new Chart(t,{type:"line",data:e,options:a});break;case"Doughnut":new Chart(t,{type:"doughnut",data:e,options:a});break;case"Pie":new Chart(t,{type:"pie",data:e,options:a});break;case"Bar":new Chart(t,{type:"bar",data:e,options:a});break;case"Radar":new Chart(t,{type:"radar",data:e,options:a});break;case"PolarArea":new Chart(t,{data:e,type:"polarArea",options:a})}}d(window).resize(i),i()},r.prototype.init=function(){this.respChart(d("#lineChart"),"Line",{labels:["January","February","March","April","May","June","July","August","September","October"],datasets:[{label:"Sales Analytics",fill:!0,lineTension:.5,backgroundColor:"rgba(51, 141, 221, 0.2)",borderColor:"#2f8ee0",borderCapStyle:"butt",borderDash:[],borderDashOffset:0,borderJoinStyle:"miter",pointBorderColor:"#2f8ee0",pointBackgroundColor:"#fff",pointBorderWidth:1,pointHoverRadius:5,pointHoverBackgroundColor:"#2f8ee0",pointHoverBorderColor:"#eef0f2",pointHoverBorderWidth:2,pointRadius:1,pointHitRadius:10,data:[65,59,80,81,56,55,40,55,30,80]},{label:"Monthly Earnings",fill:!0,lineTension:.5,backgroundColor:"rgba(235, 239, 242, 0.2)",borderColor:"#ebeff2",borderCapStyle:"butt",borderDash:[],borderDashOffset:0,borderJoinStyle:"miter",pointBorderColor:"#ebeff2",pointBackgroundColor:"#fff",pointBorderWidth:1,pointHoverRadius:5,pointHoverBackgroundColor:"#ebeff2",pointHoverBorderColor:"#eef0f2",pointHoverBorderWidth:2,pointRadius:1,pointHitRadius:10,data:[80,23,56,65,23,35,85,25,92,36]}]},{scales:{yAxes:[{ticks:{max:100,min:20,stepSize:10}}]}});this.respChart(d("#doughnut"),"Doughnut",{labels:["Desktops","Tablets"],datasets:[{data:[300,210],backgroundColor:["#6fd08b","#ebeff2"],hoverBackgroundColor:["#6fd08b","#ebeff2"],hoverBorderColor:"#fff"}]});this.respChart(d("#pie"),"Pie",{labels:["Desktops","Tablets"],datasets:[{data:[300,180],backgroundColor:["#4bbbce","#ebeff2"],hoverBackgroundColor:["#4bbbce","#ebeff2"],hoverBorderColor:"#fff"}]});this.respChart(d("#bar"),"Bar",{labels:["January","February","March","April","May","June","July"],datasets:[{label:"Sales Analytics",backgroundColor:"#4bbbce",borderColor:"#4bbbce",borderWidth:1,hoverBackgroundColor:"#4bbbce",hoverBorderColor:"#4bbbce",data:[65,59,81,45,56,80,50,20]}]});this.respChart(d("#radar"),"Radar",{labels:["Eating","Drinking","Sleeping","Designing","Coding","Cycling","Running"],datasets:[{label:"Desktops",backgroundColor:"rgba(179,181,198,0.2)",borderColor:"rgba(179,181,198,1)",pointBackgroundColor:"rgba(179,181,198,1)",pointBorderColor:"#fff",pointHoverBackgroundColor:"#fff",pointHoverBorderColor:"rgba(179,181,198,1)",data:[65,59,90,81,56,55,40]},{label:"Tablets",backgroundColor:"rgba(103, 168, 228, 0.2)",borderColor:"#67a8e4",pointBackgroundColor:"#67a8e4",pointBorderColor:"#fff",pointHoverBackgroundColor:"#fff",pointHoverBorderColor:"#67a8e4",data:[28,48,40,19,96,27,100]}]});this.respChart(d("#polarArea"),"PolarArea",{datasets:[{data:[11,16,7,18],backgroundColor:["#77c949","#0097a7","#ffbb44","#f32f53"],label:"My dataset",hoverBorderColor:"#fff"}],labels:["Series 1","Series 2","Series 3","Series 4"]})},d.ChartJs=new r,d.ChartJs.Constructor=r}(window.jQuery),function(){"use strict";window.jQuery.ChartJs.init()}();