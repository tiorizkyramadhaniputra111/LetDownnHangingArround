@extends('admin.layouts.app')

@section('title', 'Form Input')

@section('page-title', 'Form Input')
@section('page-subtitle', 'Berbagai jenis input form dengan style Bootstrap')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Form Input</li>
@endsection

@section('content')
<!-- Basic Inputs -->
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Basic Inputs</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Basic Input</label>
                        <input type="text" class="form-control" id="basicInput" placeholder="Enter text">
                    </div>

                    <div class="form-group">
                        <label for="helpInputTop">Input with help text</label>
                        <small class="text-muted">eg. <i>someone@example.com</i></small>
                        <input type="email" class="form-control" id="helpInputTop" placeholder="Email address">
                    </div>

                    <div class="form-group">
                        <label for="helperText">With Helper Text</label>
                        <input type="text" id="helperText" class="form-control" placeholder="Name">
                        <p><small class="text-muted">Find helper text here for given textbox.</small></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="disabledInput">Disabled Input</label>
                        <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label for="readonlyInput">Readonly Input</label>
                        <input type="text" class="form-control" id="readonlyInput" readonly value="You can't update me :P">
                    </div>

                    <div class="form-group">
                        <label for="passwordInput">Password Input</label>
                        <input type="password" class="form-control" id="passwordInput" placeholder="Password">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Input Styles -->
<section id="input-style">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Input Styles</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Use <code>.round</code> class for rounded border and <code>.square</code> for square border.</p>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="roundText">Rounded Input</label>
                                <input type="text" id="roundText" class="form-control round" placeholder="Rounded Input">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="squareText">Square Input</label>
                                <input type="text" id="squareText" class="form-control square" placeholder="Square Input">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Input with Icons -->
<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Input with Icons</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Use <code>.has-icon-left</code> or <code>.has-icon-right</code> class with <code>.position-relative</code>.</p>
                        </div>
                        <div class="col-sm-6">
                            <h6>Left Icon</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control" placeholder="Input with icon left">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h6>Right Icon</h6>
                            <div class="form-group position-relative has-icon-right">
                                <input type="text" class="form-control" placeholder="Icon Right, Default Input">
                                <div class="form-control-icon">
                                    <i class="bi bi-bookmarks"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- File Input -->
<section id="input-file-browser">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">File Input</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Multiple files input</label>
                                <input class="form-control" type="file" id="formFileMultiple" multiple>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Small file input</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file">
                            </div>
                            <div>
                                <label for="formFileLg" class="form-label">Large file input</label>
                                <input class="form-control form-control-lg" id="formFileLg" type="file">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Input Sizing -->
<section id="input-sizing">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Control Sizing Option</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Use <code>.form-control-lg</code> & <code>.form-control-sm</code> for different sizes.</p>
                        </div>
                        <div class="col-sm-4">
                            <h6>Large</h6>
                            <input class="form-control form-control-lg" type="text" placeholder="Large Input">
                        </div>
                        <div class="col-sm-4">
                            <h6>Default</h6>
                            <input class="form-control" type="text" placeholder="Default Input">
                        </div>
                        <div class="col-sm-4">
                            <h6>Small</h6>
                            <input class="form-control form-control-sm" type="text" placeholder="Small Input">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Validation States -->
<section id="input-validation">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Input Validation States</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Use <code>.is-invalid</code> and <code>.is-valid</code> classes for validation states.</p>
                        </div>
                        <div class="col-sm-6">
                            <label for="valid-state">Valid State</label>
                            <input type="text" class="form-control is-valid" id="valid-state" placeholder="Valid" value="Valid" required>
                            <div class="valid-feedback">This is valid state.</div>
                        </div>
                        <div class="col-sm-6">
                            <label for="invalid-state">Invalid State</label>
                            <input type="text" class="form-control is-invalid" id="invalid-state" placeholder="Invalid" value="Invalid" required>
                            <div class="invalid-feedback">This is invalid state.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
