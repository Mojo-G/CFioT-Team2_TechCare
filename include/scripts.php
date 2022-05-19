<!---------------JAVASCRIPT UNTUK HAPUS PASIEN---------------->
  <script>
$(document).ready(function () {
    $('#patient-table').on('click','.delete-patient-button', function() {

        $('#modal-delete-patient').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#hapus_id_pasien').val(data[0]);
    });
});
</script>
<!-------------------------------------------------------------------->

<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../assets/js/plugins/choices.min.js"></script>

<script src="../assets/js/plugins/dragula/dragula.min.js"></script>
<script src="../assets/js/plugins/jkanban/jkanban.js"></script>
<script src="../assets/js/plugins/countup.min.js"></script>
<script src="../assets/js/plugins/chartjs.min.js"></script>
<script src="../assets/js/plugins/round-slider.min.js"></script>
<script>
    // Rounded slider
    const setValue = function(value, active) {
        document.querySelectorAll("round-slider").forEach(function(el) {
            if (el.value === undefined) return;
            el.value = value;
        });
        const span = document.querySelector("#value");
        span.innerHTML = value;
        if (active)
            span.style.color = 'red';
        else
            span.style.color = 'black';
    }

    document.querySelectorAll("round-slider").forEach(function(el) {
        el.addEventListener('value-changed', function(ev) {
            if (ev.detail.value !== undefined)
                setValue(ev.detail.value, false);
            else if (ev.detail.low !== undefined)
                setLow(ev.detail.low, false);
            else if (ev.detail.high !== undefined)
                setHigh(ev.detail.high, false);
        });

        el.addEventListener('value-changing', function(ev) {
            if (ev.detail.value !== undefined)
                setValue(ev.detail.value, true);
            else if (ev.detail.low !== undefined)
                setLow(ev.detail.low, true);
            else if (ev.detail.high !== undefined)
                setHigh(ev.detail.high, true);
        });
    });

    // Count To
    if (document.getElementById('status1')) {
        const countUp = new CountUp('status1', document.getElementById("status1").getAttribute("countTo"));
        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    }
    if (document.getElementById('status2')) {
        const countUp = new CountUp('status2', document.getElementById("status2").getAttribute("countTo"));
        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    }
    if (document.getElementById('status3')) {
        const countUp = new CountUp('status3', document.getElementById("status3").getAttribute("countTo"));
        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    }
    if (document.getElementById('status4')) {
        const countUp = new CountUp('status4', document.getElementById("status4").getAttribute("countTo"));
        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    }
    if (document.getElementById('status5')) {
        const countUp = new CountUp('status5', document.getElementById("status5").getAttribute("countTo"));
        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    }
    if (document.getElementById('status6')) {
        const countUp = new CountUp('status6', document.getElementById("status6").getAttribute("countTo"));
        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    }
</script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="../assets/js/argon-dashboard.min.js?v=2.0.1"></script>