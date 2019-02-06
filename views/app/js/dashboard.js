window.onload = function(){

    fetch('?view=dashboard&mode=data')
    .then(
        (response)=>{return response.text();}
        )
    .then(function(texto){
        console.log(JSON.parse(texto));
        const data = JSON.parse(texto);
        console.log(data[0]['cotizaciones']);

        config = {
            data: data[0]['cotizaciones'],
            xkey: 'mes',
            ykeys: ['cantidad'],
            labels: ['Total Income', 'Total Outcome'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors:['#ffffff'],
            pointStrokeColors: ['black'],
            
        };
config.element='bar-chart';
        Morris.Bar(config);

        config = {
            data: data[1]['facturas'],
            xkey: 'mes',
            ykeys: ['cantidad'],
            labels: ['Total ', 'Total '],
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors:['#ffffff'],
            pointStrokeColors: ['black'],
            
        };
    
        
        config.element = 'facturas_bar';
        Morris.Bar(config);
    })
   /*  var data = [
        { y: '2014', a: 50},
        { y: '2015', a: 65},
        { y: '2016', a: 50},
        { y: '2017', a: 75},
        { y: '2018', a: 80},
        { y: '2019', a: 90},
        { y: '2020', a: 100},
        { y: '2021', a: 115},
        { y: '2022', a: 120},
        { y: '2023', a: 145},
        { y: '2024', a: 160}
      ], */
      

};