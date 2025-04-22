<div class="row mt-3" id="layanan">
    <div class="col-md-6">
        <label for="keluhan" class="form-label">Subjective / Keluhan</label>
        <div class="card">
            <div class="card-body">
                <textarea name="keluhan" id="keluhan" class="form-control" rows="15" placeholder="Ketik subjective / keluhan di sini"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <label class="form-label">Objective</label>
        <div class="card">
            <div class="card-body row">
                <div class="col-md-6 mb-3">
                    <label for="sistole" class="form-label">Sistole</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="sistole" name="sistole" required/>
                        <span class="input-group-text">mmHg</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="diastole" class="form-label">Diastole</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="diastole" id="diastole" required/>
                        <span class="input-group-text">mmHg</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="bb" class="form-label">Berat Badan</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="bb" id="bb" required>
                        <span class="input-group-text">kg</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tb" class="form-label">Tinggi Badan</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="tb" id="tb" required>
                        <span class="input-group-text">cm</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="suhu" class="form-label">Suhu</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="suhu" id="suhu" required>
                        <span class="input-group-text">°C</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="spo2" class="form-label">SPO2</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="spo2" id="spo2" required>
                        <span class="input-group-text">%</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="respirasi" class="form-label">Respiration Rate</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="respirasi" id="respirasi" required>
                        <span class="input-group-text">/mnt</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 text-end">
        <button type="button" class="btn btn-secondary previous-step me-2">Sebelumnya</button>
        <button type="button" class="btn btn-primary" id="submit_layanan"><i class="fas fa-save me-2"></i>Simpan</button>
    </div>
</div>
