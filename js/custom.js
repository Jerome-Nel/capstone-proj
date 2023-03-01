// Sidebar toggler
$('#sidebarToggler').click(function () {
  $('#mainContent').toggleClass('active-content');
  $('#sidebar').toggleClass('active-sidebar');
});

// Populate data in all table
$('#dataTable').DataTable({
  lengthChange: false,
  language: {
    emptyTable: 'No records found',
    zeroRecords: 'No matching records found',
    paginate: {
      previous: '<span aria-hidden="true">&laquo;</span>',
      next: '<span aria-hidden="true">&raquo;</span>',
    },
  },
});

// custom search bar
$('#searchBar').keyup(function () {
  const table = $('#dataTable').DataTable();
  table.search($(this).val()).draw();
});

// scanner
let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

// toggle camera button
let cameraBtn = $('#cameraBtn');

// start camera;
Instascan.Camera.getCameras()
  .then(function (cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
    } else {
      console.error('No cameras found.');
    }
  })
  .catch(function (e) {
    console.error(e);
  });

scanner.addListener('scan', function (content) {
  $('.result').html(content);
});

// cameraBtn.click(() => {
//   console.log(cameraBtn.text());

//   if (cameraBtn.text() === 'Start Camera') {
//     cameraBtn.text('Stop Camera');
//   } else {
//     cameraBtn.text('Start Camera');

//   }
// });

cameraBtn.click(() => {
  // code to stop camera
  scanner.stop();
});

// drag and drop
document.addEventListener('DOMContentLoaded', (event) => {
  var dragSrcEl = null;

  function handleDragStart(e) {
    this.style.opacity = '0.4';

    dragSrcEl = this;
    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);
  }

  function handleDragOver(e) {
    if (e.preventDefault) {
      e.preventDefault();
    }

    e.dataTransfer.dropEffect = 'move';

    return false;
  }

  function handleDragEnter(e) {
    this.classList.add('over');
  }

  function handleDragLeave(e) {
    this.classList.remove('over');
  }

  function handleDrop(e) {
    if (e.stopPropagation) {
      e.stopPropagation(); // stops the browser from redirecting.
    }

    if (dragSrcEl != this && this.className != 'fc-event over') {
      console.log(this);
      var oValue = $(this).attr('value');
      var value = $(dragSrcEl).attr('value');
      console.log(oValue);
      console.log(value);
      if (dragSrcEl.className !== 'fc-event') {
        dragSrcEl.innerHTML = this.innerHTML;
        $(dragSrcEl).attr('value', oValue);
        this.innerHTML = e.dataTransfer.getData('text/html');
        $(this).attr('value', value);
      } else {
        this.innerHTML = e.dataTransfer.getData('text/html');
        $(this).attr('value', value);
      }
    }

    return false;
  }

  function handleDragEnd(e) {
    this.style.opacity = '1';

    items.forEach(function (item) {
      item.classList.remove('over');
    });
  }

  let items = document.querySelectorAll('.grid-container .box');
  items.forEach(function (item) {
    item.addEventListener('dragstart', handleDragStart, false);
    item.addEventListener('dragenter', handleDragEnter, false);
    item.addEventListener('dragover', handleDragOver, false);
    item.addEventListener('dragleave', handleDragLeave, false);
    item.addEventListener('drop', handleDrop, false);
    item.addEventListener('dragend', handleDragEnd, false);
  });

  let items2 = document.querySelectorAll('#external-events-listing div');
  items2.forEach(function (item2) {
    item2.addEventListener('dragstart', handleDragStart, false);
    item2.addEventListener('dragenter', handleDragEnter, false);
    item2.addEventListener('dragover', handleDragOver, false);
    item2.addEventListener('dragleave', handleDragLeave, false);
    item2.addEventListener('drop', handleDrop, false);
    item2.addEventListener('dragend', handleDragEnd, false);
  });
});
