<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>选择喜欢的标签</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .label-container {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>请选择您喜欢的标签</h1>
    <form id="tagForm">
        <div class="label-container">
            <input type="checkbox" id="tag1" name="tags" value="标签1">
            <label for="tag1">标签1</label>
        </div>
        <div class="label-container">
            <input type="checkbox" id="tag2" name="tags" value="标签2">
            <label for="tag2">标签2</label>
        </div>
        <div class="label-container">
            <input type="checkbox" id="tag3" name="tags" value="标签3">
            <label for="tag3">标签3</label>
        </div>
        <div class="label-container">
            <input type="checkbox" id="tag4" name="tags" value="标签4">
            <label for="tag4">标签4</label>
        </div>
        <div class="label-container">
            <input type="checkbox" id="tag5" name="tags" value="标签5">
            <label for="tag5">标签5</label>
        </div>
        <div class="label-container">
            <input type="checkbox" id="tag6" name="tags" value="标签6">
            <label for="tag6">标签6</label>
        </div>
        <div class="label-container">
            <input type="checkbox" id="tag7" name="tags" value="标签7">
            <label for="tag7">标签7</label>
        </div>
        <div class="label-container">
            <input type="checkbox" id="tag8" name="tags" value="标签8">
            <label for="tag8">标签8</label>
        </div>
        <br>
        <button type="button" onclick="getSelectedTags()">提交</button>
    </form>

    <script>
        function getSelectedTags() {
            const form = document.getElementById('tagForm');
            const checkboxes = form.elements['tags'];
            let selectedTags = [];

            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    selectedTags.push(checkboxes[i].value);
                }
            }

            alert('您喜欢的标签是: ' + selectedTags.join(', '));
        }
    </script>
</body>
</html>