$(function(){
	var price = prompt('金額を入力してください','');
	var tax = price*1.08

	$('.subtitle').html(tax + '円（税込み）');
});