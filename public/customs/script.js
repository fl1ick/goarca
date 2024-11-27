const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});

// // Tambahkan event listener untuk modal
// const modal = document.getElementById('exampleModal'); // Ganti 'myModal' dengan ID modal Anda

// if (modal) {
//     modal.addEventListener('show.bs.modal', function () {
//         sidebar.classList.add('hide'); // Sembunyikan sidebar saat modal ditampilkan
//     });

//     modal.addEventListener('hide.bs.modal', function () {
//         sidebar.classList.remove('hide'); // Tampilkan kembali sidebar saat modal ditutup
//     });
// }


// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})
