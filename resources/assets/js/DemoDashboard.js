(function (namespace, $) {
	"use strict";

	var DemoDashboard = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	var p = DemoDashboard.prototype;

	// =========================================================================
	// MEMBERS
	// =========================================================================

	p.rickshawSeries = [[], []];
	p.rickshawGraph = null;
	p.rickshawRandomData = null;
	p.rickshawTimer = null;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		this._initSparklines();
		this._initFlotVisitors();
		this._initRickshaw();
		this._initKnob();
		this._initFlotRegistration();
	};

	// =========================================================================
	namespace.DemoDashboard = new DemoDashboard;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
