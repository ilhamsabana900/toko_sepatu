document.addEventListener('DOMContentLoaded', function() {
    const provinsiSelect = document.getElementById('provinsi_id');
    const kotaSelect = document.getElementById('kota_id');
    const kecamatanSelect = document.getElementById('kecamatan_id');
    const kelurahanSelect = document.getElementById('kelurahan_id');

    provinsiSelect.addEventListener('change', function() {
        const provinceId = this.value;
        if (provinceId) { // Tambahkan pengecekan nilai
            fetchCities(provinceId);
        }
    });

    kotaSelect.addEventListener('change', function() {
        const regencyId = this.value;
        fetchDistricts(regencyId);
    });

    kecamatanSelect.addEventListener('change', function() {
        const districtId = this.value;
        fetchVillages(districtId);
    });

    function fetchCities(provinceId) {

        console.log(`Fetching cities for provinceId: ${provinceId}`);
        fetch(`/api/cities/${provinceId}`)
            .then(response => response.json())
            .then(data => {
                console.log(kotaSelect);
                kotaSelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
                console.log(kotaSelect.innerHTML);
                data.forEach(kota => {
                    console.log(`Menambah kota:${kota.name}`);
                    
                    kotaSelect.innerHTML += `<option value="${kota.id}">${kota.name}</option>`;
                });
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
            })
            .catch(error => console.error('Error fetching cities:', error));
    }




    function fetchDistricts(regencyId) {
        fetch(`/api/districts/${regencyId}`) // Tambahkan tanda kutip yang benar
            .then(response => response.json())
            .then(data => {
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                data.forEach(kecamatan => { // Mengganti city menjadi kecamatan
                    kecamatanSelect.innerHTML +=
                        `<option value="${kecamatan.id}">${kecamatan.name}</option>`; // Tambahkan tanda kutip yang benar
                });
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
            });
    }

    function fetchVillages(districtId) {
        fetch(`/api/villages/${districtId}`) // Tambahkan tanda kutip yang benar
            .then(response => response.json())
            .then(data => {
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
                data.forEach(kelurahan => { // Mengganti village menjadi kelurahan
                    kelurahanSelect.innerHTML +=
                        `<option value="${kelurahan.id}">${kelurahan.name}</option>`; // Tambahkan tanda kutip yang benar
                });
            });
    }
});