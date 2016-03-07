angular
	.module("app", [])
	.run(jalan)
	.controller('BabeController', BabeController)
	;


function jalan($rootScope) {	
	$rootScope.message = 'Info Barang Loak';
	console.log("uye");
}

function BabeController($scope, $http){
	// List of babe got from the server
	  $scope.babes = [];	  
	  $scope.babe = null;
	  $scope.buttonupdate = false;
	  $scope.editBabeTitle = "Input Barang Bekas (babe)";
	  
	  $scope.currentPage = 0;
	  
	  // Fill the array to display it in the page
	  function refresh(){
		  $scope.babes = [];
		  $http.get('http://localhost/latihan/jayagrosir/jsonserver2.php?action=get_babe_list').success(function(babes){
			  console.log(babes);
			  for (var i in babes)
				  $scope.babes.push(babes[i]);
		  });
		  
		  pagecount();
		  paging($scope.currentPage);
		  
		  $scope.babe = null;
	  }
	  
	  //----
	  //hapus
	  function hapus(babe){
		  // Pop up a confirmation dialog
		  var confirmation = confirm('Anda akan menghapus babe?');

		  // Check and make sure the babe confirmed
		  if (confirmation === true) {
			  var responsePromise = $http.delete("http://localhost/latihan/jayagrosir/jsonserver2.php?id=" + babe.id);

			  responsePromise.success(function(data, status, headers, config) {
				  refresh();
			  });
			  responsePromise.error(function(data, status, headers, config) {
				  alert("AJAX failed!");
			  });
		  }else {
			  // If they said no to the confirm, do nothing
			  return false;
		  }
	  }

	  $scope.hapus = hapus;
	  
	  //-----
	  //tambah
	  function tambah(){
		  console.log($scope.babe.nama);
		  var responsePromise = $http.post("http://localhost/latihan/jayagrosir/jsonserver2.php", $scope.babe);

		  responsePromise.success(function(data, status, headers, config) {        	
			  $scope.person=null;
			  refresh();        	
		  });
		  responsePromise.error(function(data, status, headers, config) {
			  alert("AJAX failed!");
		  });
	  }

	  $scope.tambah = tambah;
	  
	  //isi form
	  function isiForm(babe){
		  //async, menunggu [send] balik dari server
		  //console.log('ini '+babe.id);
		  var responsePromise = $http.get("http://localhost/latihan/jayagrosir/jsonserver2.php?action=get_babe&id=" + babe.id);

		  responsePromise.success(function(data, status, headers, config) {
			  //console.log(data);
			  $scope.babe = data[0];			  
			  //toggle, show update button, hide save button
			  $scope.buttonupdate=true;
			  $scope.editBabeTitle = "Babe Lama";			  
		  });
		  responsePromise.error(function(data, status, headers, config) {
			  alert("AJAX failed!");
		  });
	  }

	  $scope.isiForm = isiForm;

	  //-----
	  //ubah
	  function ubah(){
		  console.log($scope.babe);
		  var responsePromise = $http.put("http://localhost/latihan/jayagrosir/jsonserver2.php", $scope.babe);

		  responsePromise.success(function(data, status, headers, config) {        	
			  $scope.person=null;
			  
			  //kembali ke opsi buat babe baru yaitu batal update
			  batal();
			  refresh();        	
		  });
		  responsePromise.error(function(data, status, headers, config) {
			  alert("AJAX failed!");
		  });
	  }

	  $scope.ubah = ubah;
	  
	  function batal(){
		  $scope.buttonupdate= !true;
		  $scope.editBabeTitle = "Babe Baru";
		  $scope.babe = null; 
	  }	  
	  $scope.batal = batal;
	  
	  
	  	  
	  //TODO: ubah ini
	//paging	  
	  function paging(pageNo){
		  $http.get('http://localhost/latihan/jayagrosir/jsonserver2.php?action=page&pageno='+ pageNo).success(function(jumlah){			 
			  //console.log(jumlah);
			  $scope.babes = jumlah;			  
		  });
		  
		  $scope.babe = null;
	  }
	  
	  $scope.paging = paging;
	  
	  //pagecount
	  function pagecount(){
		  $http.get('http://localhost/latihan/jayagrosir/jsonserver2.php?action=pagecount').success(function(jumlah){			 
			  $scope.jumlah = jumlah[0].totalpage;
			  //hardcode
			  $scope.jumlah = parseInt( $scope.jumlah / 3 );
		  });
	  }
	  //$scope.pagecount = pagecount;
	  
	 function pagingbefore(){
		 if($scope.currentPage > 0){
			 $scope.currentPage--;
			 paging($scope.currentPage);
		 }
	 }
	 $scope.pagingbefore = pagingbefore;
	 
	 function pagingnext(){
		 if($scope.currentPage < $scope.jumlah){
			 $scope.currentPage++;
			 paging($scope.currentPage);
		 }
	 }
	 $scope.pagingnext = pagingnext;
	 
	  //runn di awal control
	  refresh();
}

