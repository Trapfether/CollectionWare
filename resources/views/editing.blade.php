@extends('App')

@section('title')
Main
@endsection

@section('headScripts')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
@endsection

@section('content')
<div class="row fullHeight">
    <div id="mainPane" class="col-xs-12 fullHeight noPadding">
        <div id="windowsBar" class="clearfix">
            <div id="newButton" class="windowsController">New</div>
            <div id="openButton" class="windowsController">Open</div>
        </div>
        <div id="windowPanel" class="fullHeight">
        </div>
    </div>
</div>
@endsection

@section('footScripts')

<style type="text/css" media="screen">
    .container-fluid{
        height: 100%;
    }
    #windowsBar{
        background-color: #ffffff;
        border-bottom: 1px solid #444444;
    }
    #windowPanel{
        position: fixed;
        top: 78px;
        right: 0px;
        left: 0px;
        bottom: 0px;
    }
    .windowsController{
        cursor: pointer;
        color: #000000;
        float: left;
        padding: 5px;
    }
    .widgetBox{
        padding: 5px;
        background-color: #41A9CC;
        color: white;
    }
    .widgetWYSIWYG{
        position: absolute;
        top: 25px;
        left: 5px;
        right: 5px;
        bottom: 5px;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="{{ asset('/files/ace-src/ace.js') }}" type="text/javascript" charset="utf-8"></script>

<script>
    function readyFunction()
    {
        function editorClass(input)
        {
            this.id = this.generateID();
            this.title = input.title;
            this.width = input.width || 300;
            this.height = input.height || 300;
            this.box = $(''+
                '<div id="'+this.id+'" class="widgetBox">'+
                    '<div class="widgetTitleBar">'+this.title+'</div>'+
                    '<div class="widgetContent">'+
                        '<div class="widgetWYSIWYG" >'+
                        '</div>'+
                    '</div>'+
                '</div>');
            $(this.box).draggable({drag:this.window_onDrag,stop: this.window_onDragStop}).resizable().css({'width':this.width,'height':this.height,'border-radius':'3px'});
            this.editor = ace.edit($(this.box).find('.widgetWYSIWYG')[0]);
            this.editor.setTheme("ace/theme/monokai");
            this.editor.getSession().setMode("ace/mode/javascript");
            this.registerWindow();
            $('#'+input.insert).append(this.box);
        }

        editorClass.prototype.windowCount = 0;
        editorClass.prototype.windows = {};

        editorClass.prototype.generateID = function generateID(){
            var output = 'window-num-' + this.windowCount;
            editorClass.prototype.windowCount++;
            return output;
        }

        editorClass.prototype.registerWindow = function registerWindow(){
            editorClass.prototype.windows[this.id] = this;
        }

        editorClass.prototype.leftBounds = function leftBounds(){
            return $('#windowPanel').offset().left;
        }

        editorClass.prototype.topBounds = function topBounds(){
            return $('#windowPanel').offset().top;
        }

        editorClass.prototype.rightBounds = function rightBounds(){
            return $(window).width();
        }

        editorClass.prototype.bottomBounds = function bottomBounds(){
            return $(window).height();
        }

        editorClass.prototype.window_onDrag = function window_onDrag(event, ui)
        {
            var width = parseInt($(this).css('width'));
            var height = parseInt($(this).css('height'));
            var left = ui.offset.left;
            var top = ui.offset.top;
            var funcs = editorClass.prototype;
            left = Math.min(Math.max(left,funcs.leftBounds()),funcs.rightBounds()-width);
            top = Math.min(Math.max(top,funcs.topBounds()),funcs.bottomBounds()-height);
            $('#windowPanel').css('border','0px');
            if(top > ui.offset.top + 5)
            {
                $('#windowPanel').css('border-top','3px solid #6fcc41');
            }
            else if(left > ui.offset.left + 5)
            {
                $('#windowPanel').css('border-left','3px solid #6fcc41');
            }
            else if(left < ui.offset.left - 5)
            {
                $('#windowPanel').css('border-right','3px solid #6fcc41');
            }
            ui.position.left = left - ui.offset.left + ui.position.left;
            ui.position.top = top - ui.offset.top + ui.position.top;
        }

        editorClass.prototype.window_onDragStop = function window_onDrag(event, ui)
        {
            var width = parseInt($(this).css('width'));
            var height = parseInt($(this).css('height'));
            var left = ui.offset.left;
            var top = ui.offset.top;
            var wp = $('#windowPanel');
            var funcs = editorClass.prototype;
            if(parseInt($(wp).css('border-top')) > 0) // this window was dragged onto the top bar
            {
                left = funcs.leftBounds();
                top = funcs.topBounds();
                width = funcs.rightBounds()-funcs.leftBounds();
                height = funcs.bottomBounds() - funcs.topBounds();
            }
            else if(parseInt($(wp).css('border-left')) > 0) // this window was dragged onto the top bar
            {
                left = funcs.leftBounds();
                top = funcs.topBounds();
                width = (funcs.rightBounds()-funcs.leftBounds())/2;
                height = funcs.bottomBounds() - funcs.topBounds();
            }
            else if(parseInt($(wp).css('border-right')) > 0) // this window was dragged onto the top bar
            {
                left = (funcs.leftBounds()+funcs.rightBounds())/2;
                top = funcs.topBounds();
                width = (funcs.rightBounds()-funcs.leftBounds())/2;
                height = funcs.bottomBounds() - funcs.topBounds();
            }
            $(wp).css('border','0px');
            ui.position.left = left - ui.offset.left + ui.position.left;
            ui.position.top = top - ui.offset.top + ui.position.top;
            $(this).css({'left':ui.position.left,'top':ui.position.top,'width':width,'height':height});
            var wHandle = funcs.windows[$(this).attr('id')];
            wHandle.width = width;
            wHandle.height = height;
        }

        editorClass.prototype.collection = {};

        editor1 = new editorClass({insert:'windowPanel',title:'My BadAss Editor, BTW Hi Zach!',width:300,height:300});

    }
</script>

@endsection