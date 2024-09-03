<?php defined('PASS') or die('unauthorized access!') ?>
<!DOCTYPE html>
<html lang="<?php echo get_lang() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>短链URL</title>
    <link rel="stylesheet" href="https://testingcf.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://testingcf.jsdelivr.net/npm/editor.md@1.5.0/css/editormd.min.css"/>
    <style type="text/css">
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<div style="margin-bottom: 1rem;">
   
</div>

<div class="container">

    <div class="card text-center">
        <div class="card-header">
            <?php echo __('GENERATE SHORT URL') ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo __('Quickly generate URL') ?></h5>

            <!-- <div class="form-group">
                <label for="urlTextInput">URL</label>
                <input type="text" id="urlTextInput" class="form-control" placeholder="Enter URL link">
            </div> -->

            <div class="input-group mb-3">
                <input type="text" id="urlTextInput" class="form-control"
                       placeholder="<?php echo __('Enter URL link') ?>">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="generate"
                            onclick="javascript:generate()"><?php echo __('Generate') ?></button>
                </div>
            </div>
            <div class="mb-3" id="extent-element">
                <h5><?php echo __('Firewall')?></h5>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="radio-ban-china_browser" name="encrypt_type" class="custom-control-input"
                           value="ban_china_browser" checked="">
                    <label class="custom-control-label" for="radio-ban-china_browser"><?php echo __('Ban China Browser') ?></label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="radio-fake-page" name="encrypt_type" class="custom-control-input"
                           value="fake_page" checked="">
                    <label class="custom-control-label" for="radio-fake-page"><?php echo __('Fake page') ?></label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="radio-once" name="encrypt_type" class="custom-control-input"
                           value="once">
                    <label class="custom-control-label" for="radio-once"><?php echo __('Redirect once') ?></label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="radio-password" name="encrypt_type" class="custom-control-input"
                           value="password">
                    <label class="custom-control-label" for="radio-password"><?php echo __('Password access') ?></label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="radio-pc-only" name="encrypt_type" class="custom-control-input"
                           value="pc_only">
                    <label class="custom-control-label" for="radio-pc-only"><?php echo __('PC access only') ?></label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="radio-mobile-only" name="encrypt_type" class="custom-control-input"
                           value="mobile_only">
                    <label class="custom-control-label"
                           for="radio-mobile-only"><?php echo __('Mobile access only') ?></label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="radio-china-only" name="encrypt_type" class="custom-control-input"
                           value="china_only">
                    <label class="custom-control-label"
                           for="radio-china-only"><?php echo __('Mainland China access only') ?></label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="radio-non-china-only" name="encrypt_type" class="custom-control-input"
                           value="non_china_only">
                    <label class="custom-control-label"
                           for="radio-non-china-only"><?php echo __('Non-mainland China access only') ?></label>
                </div>
                <h5 class="mt-2"><?php echo __('Endpoint');?></h5>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="radio-normal" name="encrypt_type" class="custom-control-input"
                           value="normal">
                    <label class="custom-control-label" for="radio-normal"><?php echo __('Normal') ?></label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="radio-dynamic" name="encrypt_type" class="custom-control-input"
                           value="dynamic">
                    <label class="custom-control-label" for="radio-dynamic"><?php echo __('No referer') ?></label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="radio-encrypt" name="encrypt_type" class="custom-control-input"
                           value="encrypt" checked="">
                    <label class="custom-control-label" for="radio-encrypt"><?php echo __('Encrypt redirect') ?></label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline" style="display: inline-block;">
                    <input type="checkbox" id="radio-whisper" name="encrypt_type" class="custom-control-input"
                           value="whisper">
                    <label class="custom-control-label" for="radio-whisper"><?php echo __('Whisper text') ?></label>
                </div>
            </div>

            <div class="card">
                <div class="card-body text-left">
                    <p><b> 🏄🏼‍♀️ <?php echo __('Normal') ?>: </b><?php echo __('Jump directly to the website') ?><br>
                        <b>🐸<?php echo __('No referer') ?>: </b><?php echo __('No Referer parameter') ?><br>
                        <b>🕷 <?php echo __('Encrypt redirect') ?>
                            : </b><?php echo __('Encrypted access, anti-crawler') ?><br>
                        <b>👺 <?php echo __('Fake page') ?>
                            : </b><?php echo __('Use random news, forums, product website information to fool robots') ?>
                        <br>
                        <b>🔥 <?php echo __('Redirect once') ?>: </b><?php echo __('Jump only once') ?><br>
                        <b>🔑 <?php echo __('Password access') ?>: </b><?php echo __('Password required') ?><br>
                        <b>📝 <?php echo __('Whisper text') ?>: </b><?php echo __('Append rich text information') ?><br>
                        <b>💻 <?php echo __('PC access only') ?>
                            : </b><?php echo __('Only PC users can access this page') ?><br>
                        <b>📱 <?php echo __('Mobile access only') ?>
                            : </b><?php echo __('Only Mobile users can access this page') ?><br>
                        <b>🇨🇳 <?php echo __('Access only to users in mainland China') ?>
                            : </b><?php echo __('Access only to users in mainland China') ?><br>
                        <b>🗺️ <?php echo __('Only access users who are not in mainland China') ?>
                            : </b><?php echo __('Only access users who are not in mainland China') ?><br>
                    </p>
                </div>
            </div>

            <div class="form-group hidden" extent="radio-password">
                <label for="input-password">Password</label>
                <input type="password" class="form-control" id="input-password" placeholder="Password">
            </div>
            <div class="form-group hidden" extent="radio-whisper">
                <label for="exampleFormControlTextarea1">whisper</label>
                <div id="editor" style="width: 100%;height: 500px;">
                    <!-- Tips: Editor.md can auto append a `<textarea>` tag -->
                    <textarea id="input-whisper" style="display:none;">### Write a message...</textarea>
                </div>
            </div>

            <div id="let-dialog"></div>

            <div class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Result</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="copy-text"><input type="text" name="" id="" value="https://u.songw.top/" style=" width: 100%;" readonly="readonly"/></p>
                            <p id="copy-result"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="javascript:copy()">Copy</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer text-muted">
            <?php
            $su = new \Libs\ShortURL();
            echo __('This site generates a total of :url_record_history links，Currently active :url_active_history', ['url_record_history' => $su->getUrlRecordHistory(), 'url_active_history' => $su->getUrlRecord()]) ?>
            。
        </div>
    </div>
</div>


<script src="https://testingcf.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>

<script src="https://testingcf.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://testingcf.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script src="https://testingcf.jsdelivr.net/npm/editor.md@1.5.0/editormd.min.js"></script>
<script type="text/html" id="tpl-alert">
    <div class="alert alert-{{status}} alert-dismissible fade show" role="alert">
        <strong>{{status}}!</strong> {{message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</script>
<script type="text/javascript">
    var editor = null;

    function message(msg, status) {
        let html = $('#tpl-alert').html();
        html = html.replace(new RegExp('{{message}}', 'g'), msg);
        html = html.replace(new RegExp('{{status}}', 'g'), status);
        $('#let-dialog').html(html);
    }

    function copy() {
        $('#copy-text input').select();
        $('#copy-text input').get(0).setSelectionRange(0, $('#copy-text input').val().length);
        if (document.execCommand('copy')) {
            document.execCommand('copy');
            $('#copy-result').text('copy success!');
        }

    }

    function cancelCheckedForForm(name, value){
        $(`[name="${name}"][value="${value}"]`).prop('checked', false);
    }

    $('#extent-element input[type="checkbox"]').click(function () {
        var name = $(this).attr('name');
        $('[extent]').hide();
        let current = $(this).val();
        console.log("current:", current);
        var selected = [];
        $('[name="' + name + '"]:checked').each(function () {
            selected.push($(this).val());
        });
        // 原始单选 冲突
        let bindingEndpoint = [
            'normal',
            'dynamic',
            'encrypt',
            'whisper',
        ]

        let currentSelected = $(this).val()
        if(bindingEndpoint.indexOf(currentSelected) > -1){
            bindingEndpoint.filter(i => i!=currentSelected).map( i =>{
                cancelCheckedForForm(name, i)
            })
        }

        // PC、手机选择 冲突
        if (current == 'pc_only') {
            cancelCheckedForForm(name, 'mobile_only')
        } else if (current == 'mobile_only') {
            cancelCheckedForForm(name, 'pc_only')
        }
        // 大陆、非大陆 冲突
        if (current == 'china_only') {
            cancelCheckedForForm(name, 'non_china_only')
        } else if (current == 'non_china_only') {
            cancelCheckedForForm(name, 'china_only')
        }

        let id = $(this).attr('id');
        $('#extent-element input[type="checkbox"]').each(function () {
            if (selected.indexOf($(this).val()) != -1) {
                $('[extent="' + $(this).attr('id') + '"]').show();
            }
        });
        // 富文本首次初始化
        if (id == 'radio-whisper' && editor == null) {
            editor = editormd("editor", {
                // width: "630px",
                height: 630,
                path: "https://testingcf.jsdelivr.net/npm/editor.md@1.5.0/lib/"  // Autoload modules mode, codemirror, marked... dependents libs path
            });
        }


        if(current == "password"){
            $('#input-password').focus();
        }

    });

    function generate() {
        let url = $('#urlTextInput').val();
        var selected = [];
        let extent = {}
        $('input[name="encrypt_type"]:checked').each(function () {
            let encrypt_type = $(this).val();
            selected.push(encrypt_type);
            extent[encrypt_type] = $('#input-' + encrypt_type).val();
        });
        $.ajax({
            type: "post",
            url: "<?php echo rtrim(SUB_PATH,'/');?>/api/link",
            async: true,
            dataType: 'json',
            data: {url: url, encrypt_type: JSON.stringify(selected), extent: JSON.stringify(extent)},
            success: function (result) {
                if (result.code === 200) {
                    // convert to https if need
                    let shortURL = new URL(result.data)
                    shortURL.protocol = window.location.protocol
                    $('#copy-text input').val(shortURL);
                    message(result.msg, 'success');
                    $('.modal').modal('show');
                } else {
                    message(result.msg, 'error');
                }
            }
        });
    }
</script>
</body>
</html>
