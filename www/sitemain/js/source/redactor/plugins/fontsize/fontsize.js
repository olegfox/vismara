if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.fontsize = {
	init: function()
	{
		var fonts = [10, 11, 12, 14, 16, 18, 20, 24, 28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48, 50, 52, 54, 56, 58, 60, 70, 80, 90, 100];
		var that = this;
		var dropdown = {};

		$.each(fonts, function(i, s)
		{
			dropdown['s' + i] = { title: s + 'px', callback: function() { that.setFontsize(s); } };
		});

		dropdown['remove'] = { title: 'Remove font size', callback: function() { that.resetFontsize(); } };

		this.buttonAdd('fontsize', 'Change font size', false, dropdown);
	},
	setFontsize: function(size)
	{
		this.inlineSetStyle('font-size', size + 'px');
	},
	resetFontsize: function()
	{
		this.inlineRemoveStyle('font-size');
	}
};