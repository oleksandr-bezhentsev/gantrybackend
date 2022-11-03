@include('admin.header')
<style>
    table img {
        height:50px;
    }
    #imgs img {
        height: 75px;
    }
    .card-body {
        width:100%;
    }
    #output_image, #output_image2, #output_image3, #output_big_image, .images {
        height:170px;
    }
    #attrs input {
        width:100%;
    }
</style>
<script>
    <?php if($data['success'] == 'Successfully updated!') { ?>
    setTimeout( function () {
        blogEdited();
    }, 1000);
    <?php } ?>
</script>
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <ul class="ml-0" style="padding-left: 15px;">
                    <?php if(isset($data['breadcrumbs'])) {
                    $b_count = count($data['breadcrumbs']); ?>
                    <?php $i=1; foreach($data['breadcrumbs'] as $breadcrumb) { ?>
                    <li class="badge"><a class="btn btn-default btn-xs" href="<?= $breadcrumb['href']; ?>"><?= $breadcrumb['title']; ?></a></li>
                    <?php if($i!=$b_count) { ?>><?php } ?>
                    <?php $i++; } ?>
                    <?php } ?>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-title">Add Logo</h4>
                    <span style="color:#ff0000;"><?= $data['error']; ?></span>
                    <span style="color:#008000;"><?= $data['success']; ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="/admin/video/add/" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="card-body row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="title">Title*</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" value="<?php if(isset($data['request']['title'])) { echo $data['request']['title']; } ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="date">Tags</label>
                                        <input style="width:200px;" type="text" name="tag_1" class="form-control" placeholder="Tag 1">
                                        <input style="width:200px;" type="text" name="tag_2" class="form-control" placeholder="Tag 2">
                                        <input style="width:200px;" type="text" name="tag_3" class="form-control" placeholder="Tag 3">
                                    </div>

                                    <div class="form-check">
                                        <label>Status</label><br>
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="status" value="1" checked="">
                                            <span class="form-radio-sign">On</span>
                                        </label>
                                        <label class="form-radio-label ml-3">
                                            <input class="form-radio-input" type="radio" name="status" value="0">
                                            <span class="form-radio-sign">Off</span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="date">Sort</label>
                                        <input style="width:200px;" type="text" name="sort" class="form-control" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Zoho addon alias</label>
                                        <input type="text" name="zoho_addon_code" class="form-control" value="" aria-describedby="addonHelpInline">
                                        <small id="addonHelpInline" class="form-text text-muted">
                                            Value of 'Addon Code' field in Zoho subscriptions addons. Leave it empty, if video should be available for all subscriptions
                                        </small>
                                    </div>
                                </div>

                                <div class="card-body" style="display: none">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Image</label>
                                        <input type="file" name="image" class="form-control-file" onchange="previewImage(event)" accept="image/jpeg,image/png,image/gif" id="exampleFormControlFile1">
                                        <img style="display: none;background: #ddd;" src="" id="output_image" class="create-event__file-preview"/>
                                    </div>

                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile2">Thumbnail</label>
                                        <input type="file" name="thumbnail" class="form-control-file" onchange="previewImage2(event)" accept="image/jpeg,image/png,image/gif" id="exampleFormControlFile2">
                                        <img style="display: none;background: #ddd;" src="" id="output_image2" class="create-event__file-preview"/>
                                    </div>

                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Media</label>
                                        <input type="file" name="video" class="form-control-file" accept="image/jpeg,image/png,image/gif,mp4">
                                    </div>

                                </div>

                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="/admin/video/" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('admin.footer')
