<div class="col-md-12">
	
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>
	<div class="row">
		<div class="col-md-8">
      <div class="panel panel-red">
          <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Purchase Summary / DAY</h3>
          </div>
          <div class="panel-body">
              <div id="purchase-chart"></div>
          </div>
      </div>
		</div>
		<div class="col-md-4">
      <div class="panel panel-red">
          <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Purchase Status</h3>
          </div>
          <div class="panel-body">
              <div id="purchase-status-chart"></div>
          </div>
      </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
      <div class="panel panel-green">
          <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Sales Summary / DAY</h3>
          </div>
          <div class="panel-body">
              <div id="sale-chart"></div>
          </div>
      </div>
		</div>
		<div class="col-md-4">
      <div class="panel panel-green">
          <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Sales Status</h3>
          </div>
          <div class="panel-body">
              <div id="sale-status-chart"></div>
          </div>
      </div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<table class="table stripped table-bordered">
				<thead>
					<th>Cashflow</th>
					<th>Value</th>
				</thead>
				<tbody>
					<tr>
						<td><b>Total Income</b></td>
						<td><?php echo number_format($total_income) ?></td>
					</tr>
					<tr>
						<td><b>Total Cost</b></td>
						<td><?php echo number_format($total_cost) ?></td>
					</tr>
					<tr>
						<td><b>Total Credit (Piutang)</b></td>
						<td><?php echo number_format($total_credit) ?></td>
					</tr>
					<tr>
						<td><b>Total Debt (Hutang)</b></td>
						<td><?php echo number_format($total_debt) ?></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-md-4">
			<h3>Net Income: <?php echo  number_format($total_income - $total_cost) ?></h3>
			<h3>Gross Income: <?php echo number_format(($total_income + $total_credit) - ($total_cost + $total_debt)) ?></h3>
		</div>
	</div>
</div>