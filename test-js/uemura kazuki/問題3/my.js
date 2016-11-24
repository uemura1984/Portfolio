$(function(){
	var dateObj = new Date() ;
	var weekDayList = [ "日", "月", "火", "水", "木", "金", "土" ] ;

	var month = dateObj.getMonth() + 1 ;
	var date = dateObj.getDate() ;
	var weekDay = weekDayList[ dateObj.getDay() ] ;

	var date = month + "月" + date + "日(" + weekDay + "曜日)" ;

	$('.subtitle').html(date);
});