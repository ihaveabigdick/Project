<!DOCTYPE html>
<html>
<head>
    <meta charset="gbk">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

</head>
<body>


<video id="video" width="500px" height="500px" autoplay="autoplay"></video>
<input type="button" title="開啟鏡頭" value="開啟鏡頭" onclick="getMedia()"/>
<button id="paizhao">拍照</button>
<button id="btnUpload">上傳圖片</button>

<canvas id="canvas" width="500" height="500"></canvas>
<script type="text/javascript" src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">


    var video = document.getElementById("video");
    var context = canvas.getContext("2d");
    var errocb = function () {
        console.log("sth srong");
    }
    //调用电脑摄像头并将画面显示在网页
    // if(navigator.getUserMedia){
    //     navigator.getUserMedia({"video":true},function(stream){
    //         video.src=stream;
    //         video.play();
    //     },errocb);
    // }else if(navigator.webkitGetUserMedia){
    //     navigator.webkitGetUserMedia({"video":true},function(stream){
    //         video.src=window.webkitURL.createObjectURL(stream);
    //         video.play();
    //     },errocb);
    // }
    //利用canvas 将当前video的画面画到canvas标签节点中
    document.getElementById("paizhao").addEventListener("click", function () {
        context.drawImage(video, 0, 0, 500, 500);
    });


    $("#btnUpload").click(function () {
        var imgData = document.getElementById('canvas').toDataURL('image/png', 1);

        $.ajax({
            method: "POST",
            url: "http://163.17.9.124:8002/api/file64",
            data: {photo: imgData}
        })
            .done(function () {
                alert("成功");
                self.location.href = "http://localhost:8000/"
            }).fail(function () {
            alert("失敗");
        });
    });

    function getMedia() {
        let constraints = {
            video: {width: 500, height: 500},
            audio: false
        };
        //获得video摄像头区域
        let video = document.getElementById("video");
        //这里介绍新的方法，返回一个 Promise对象
        // 这个Promise对象返回成功后的回调函数带一个 MediaStream 对象作为其参数
        // then()是Promise对象里的方法
        // then()方法是异步执行，当then()前的方法执行完后再执行then()内部的程序
        // 避免数据没有获取到
        let promise = navigator.mediaDevices.getUserMedia(constraints);
        promise.then(function (MediaStream) {
            video.srcObject = MediaStream;
            video.play();


        });

    }

    //下面的代码是保存canvas标签里的图片并且将其按一定的规则重命名
    var type = 'png';

    var _fixType = function (type) {
        type = type.toLowerCase().replace(/jpg/i, 'jpeg');
        var r = type.match(/png|jpeg|bmp|gif/)[0];
        return 'image/' + r;
    };

    /**
     * @param  {String} filename 文件名
     */

    function getBase64(url, callback) {


        var imgData = document.getElementById('canvas').toDataURL('image/png', 1);
        console.log(imgData);


    }


    var saveFile = function (url, callback) {


        // var Img = new Image();
        // Img.src = url;
        // dataUrl = '';
        // Img = function () { //要先確保圖片完整獲取到，這是個非同步事件
        //     var canvs = document.getElementById('canvas').toDataURL(type);
        //     canvs = canvs.replace(_fixType(type), 'image/octet-stream');
        //     width = Img.width, //確保canvas的尺寸和圖片一樣
        //         height = Img.height;
        //     canvs.width = width;
        //     canvs.height = height;
        //     canvs.getContext("2d").drawImage(Img, 0, 0, width, height); //將圖片繪製到canvas中
        //     dataURL = canvs.toDataURL('image/png'); //轉換圖片為dataURL
        // };

        var errocb = function () {
            console.log("sth srong");
        }
        调用电脑摄像头并将画面显示在网页
        if (navigator.getUserMedia) {
            navigator.getUserMedia({"video": true}, function (stream) {
                video.src = stream;
                video.play();
            }, errocb);
        } else if (navigator.webkitGetUserMedia) {
            navigator.webkitGetUserMedia({"video": true}, function (stream) {
                video.src = window.webkitURL.createObjectURL(stream);
                video.play();
            }, errocb);
        }
    };

    // 下载后的文件名规则
    // var filename = (new Date()).getTime() + '.' + type;

</script>
</body>
</html>