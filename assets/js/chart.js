$(function() {
    // var baseUrl = "http://localhost/prism/";

    // purchase chart
    $.ajax({
      url: baseUrl + "api/purchase/get_summary_json",
      dataType: 'JSON',
      type: 'POST',
      data: {get_values: true},
      success: function(data) {
        new Morris.Line({
          element: 'purchase-chart',
          data: data,
          xkey: 'date',
          ykeys: ['total_amount'],
          labels: ['Purchases']
        });
      }
    });

    // purchase status
    $.ajax({
      url: baseUrl + "api/purchase/get_status_json",
      dataType: 'JSON',
      type: 'POST',
      data: {get_values: true},
      success: function(data) {
        new Morris.Donut({
          element: 'purchase-status-chart',
          data: data,
        });
      }
    });

    // sales chart
    $.ajax({
      url: baseUrl + "api/sale/get_summary_json",
      dataType: 'JSON',
      type: 'POST',
      data: {get_values: true},
      success: function(data) {
        new Morris.Line({
          element: 'sale-chart',
          data: data,
          xkey: 'date',
          ykeys: ['total_amount'],
          labels: ['Sales']
        });
      }
    });

    // sales status
    $.ajax({
      url: baseUrl + "api/sale/get_status_json",
      dataType: 'JSON',
      type: 'POST',
      data: {get_values: true},
      success: function(data) {
        new Morris.Donut({
          element: 'sale-status-chart',
          data: data
        });
      }
    });

});