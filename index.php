<?php
require_once 'config/db.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div class="container mt-5" id="app">
        <h1 class="text-center">Data Mahasiswa</h1>
        <button class="btn btn-primary mb-3" @click="showCreateModal()">Tambah Mahasiswa</button>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(mahasiswa, index) in mahasiswaList" :key="mahasiswa.id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ mahasiswa.nama }}</td>
                    <td>{{ mahasiswa.nim }}</td>
                    <td>{{ mahasiswa.jurusan }}</td>
                    <td>{{ mahasiswa.email }}</td>
                    <td>{{ mahasiswa.tanggal_lahir }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" @click="showEditModal(mahasiswa)">Edit</button>
                        <button class="btn btn-danger btn-sm" @click="deleteMahasiswa(mahasiswa.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Modal Create -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="createMahasiswa">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" v-model="newMahasiswa.nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" v-model="newMahasiswa.nim" required>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" v-model="newMahasiswa.jurusan" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" v-model="newMahasiswa.email" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" v-model="newMahasiswa.tanggal_lahir" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="updateMahasiswa">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" v-model="currentMahasiswa.nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" v-model="currentMahasiswa.nim" required>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" v-model="currentMahasiswa.jurusan" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" v-model="currentMahasiswa.email" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" v-model="currentMahasiswa.tanggal_lahir" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const app = Vue.createApp({
            data() {
                return {
                    mahasiswaList: [],
                    newMahasiswa: {
                        nama: '',
                        nim: '',
                        jurusan: '',
                        email: '',
                        tanggal_lahir: ''
                    },
                    currentMahasiswa: {}
                }
            },
            methods: {
                fetchMahasiswa() {
                    axios.get('api/mahasiswa.php').then(response => {
                        this.mahasiswaList = response.data;
                    });
                },
                showCreateModal() {
                    const modal = new bootstrap.Modal(document.getElementById('createModal'));
                    modal.show();
                },
                createMahasiswa() {
                    axios.post('api/create.php', this.newMahasiswa).then(response => {
                        this.fetchMahasiswa();
                        const modal = bootstrap.Modal.getInstance(document.getElementById('createModal'));
                        modal.hide();
                    });
                },
                showEditModal(mahasiswa) {
                    this.currentMahasiswa = {
                        ...mahasiswa
                    };
                    const modal = new bootstrap.Modal(document.getElementById('editModal'));
                    modal.show();
                },
                updateMahasiswa() {
                    axios.post('api/edit.php', this.currentMahasiswa).then(response => {
                        this.fetchMahasiswa();
                        const modal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                        modal.hide();
                    });
                },
                deleteMahasiswa(id) {
                    axios.post('api/delete.php', {
                        id
                    }).then(response => {
                        this.fetchMahasiswa();
                    });
                }
            },
            mounted() {
                this.fetchMahasiswa();
            }
        });

        app.mount('#app');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>