
<div class="card mb-3" ng-repeat="item in data" ng-class="{'card-closed': !groupVisibility}" ng-init="groupVisibility=1">
	<div class="card-header text-uppercase" ng-click="groupVisibility=!groupVisibility">
		<span class="material-icons card-toggle-indicator">keyboard_arrow_down</span>
		{{ item.set.name }}
	</div>
	<div class="card-body" ng-show="groupVisibility">
		
	</div>
</div> 	</div> 