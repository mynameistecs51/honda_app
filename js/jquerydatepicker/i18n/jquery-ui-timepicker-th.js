/* Thai translation for the jQuery Timepicker Addon */
(function($) {
	$.timepicker.regional['th'] = {
		timeOnlyTitle: 'เลือกเวลา',
		timeText: 'เวลา ',
		hourText: 'ชั่วโมง ',
		minuteText: 'นาที',
		secondText: 'วินาที',
		millisecText: 'มิลลิวินาที',
		microsecText: 'ไมโคริวินาที',
		timezoneText: 'เขตเวลา',
		currentText: 'วันนี้',
		closeText: 'ปิด',
		monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
		dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
		dayNamesShort: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
		dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
		//use24hours: true,
		changeMonth: true,
		changeYear: true, 
		dateFormat: 'dd/mm/yy',
		controlType: 'select',
		oneLine: true,
		timeFormat: 'HH:mm',
	};
	$.timepicker.setDefaults($.timepicker.regional['th']);
})(jQuery);

