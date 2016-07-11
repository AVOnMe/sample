
(function () {
var sum = 200;
//change this value to test

var coinTypes = [1, 2, 5, 10, 20, 50, 100, 200];
var chainBuffer = [];
//this variable contain the permutation result.

function CoinSums(b, sum) {
if(!b) var b = [];
//b means buffer

if (sum === 0) {
//indicate the termination of loop (permutation)
chainBuffer.push(b); 
return;

}

for (var c = 0, l = coinTypes.length; c < l; c++) {
var a = b.slice();
//save the sate of incoming query

if(coinTypes[c] <= sum && (!b.length || coinTypes[c] >= b[b.length-1])) {
b.push(coinTypes[c]);
CoinSums(b, sum - coinTypes[c]);

/* if you find a value less than sum, means that you have at least so many permutations,
while you take out value coinTypes[c], the remainder has its own permutation, the samllest coin has value 1,
do not worry about the remainder can not build a permutation
(!b.length || coinTypes[c] >= b[b.length-1]) control the order be consecutive
*/
}

b = a;
//restore incoming query status

}

}


CoinSums(null, sum);

var result = chainBuffer.length;

window.onload=function(){document.body.innerHTML = '<pre>there are ' + result + ' possible combinations.</pre>';}
//console.log(result);
//73682

})();







