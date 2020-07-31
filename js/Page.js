// 完成一个分页需要哪些数据?

// 1. 数据的总数量 (count)   1000
// 2. 每页显示多少条数据  ( showNum  10)
//    Math.ceil( count / showNum)  => 最大的页码数  (1 - 300)
// 如果总页码比较少     1   => 只显示1页
// 如果总页码比较多   300   => 显示5页

// 3. 默认显示多少页码  (showPage);

function Page(selector, options) {  // 都是存到实例化对象中
    // 创建分页的父元素
    this.parent = document.querySelector(selector);
    this.options = options;
    this.pageIndex = 1; // 初始化时 显示第一页 (记录点击的页码)
    this.init();   // 创建实例时 默认进行初始化
}
Page.prototype.init = function () {

    if (!this.parent.classList.contains("page")) {
        this.parent.classList.add("page");
    }
    if (this.options.currentPage) {
        this.pageIndex = this.options.currentPage;
    }
    this.createHtml();
    this.createPage();
}
Page.prototype.createHtml = function () {
    // 将页面的基本结构创建  放到父元素 this.parent中

    var _this = this;

    // 上一页
    var prev = document.createElement("span");
    prev.className = "prev";
    prev.textContent = "上一页";
    prev.onclick = function () {
        _this.pageIndex--;
        _this.createPage();
        // if (_this.options.callback) {
        //     // _this.options.callback(_this.pageIndex);
        //     _this.options.callback(_this.pageIndex - 1);
        // }
    }
    this.parent.appendChild(prev);

    // 装页码的盒子 (存到实例化对象中)
    this.pageBox = document.createElement("ul");
    this.pageBox.className = "pageBox";
    this.parent.appendChild(this.pageBox);

    // 下一页
    var next = document.createElement("span");
    next.className = "next";
    next.textContent = "下一页";

    next.onclick = function () {
        _this.pageIndex++;
        _this.createPage();
        // if (_this.options.callback) {
        //     // _this.options.callback(_this.pageIndex);
        //     _this.options.callback(_this.pageIndex - 1);
        // }
    }

    this.parent.appendChild(next);

}



Page.prototype.createPage = function () {
    // 动态生成页码
    // this.options.count   总页码
    // this.options.showNum  每页显示多少天
    // this.options.showPage   默认显示多少页码

    // 总页数  =Math.ceil( count/showNum);

    var _this = this;   //指向调用此方法的实例化对象
    this.pageBox.innerHTML = ""; // 生成页码之前 清空原有的


    var maxPage = Math.ceil(this.options.count / this.options.showNum);
    var mid = Math.floor(this.options.showPage / 2);
    // var start = 1;
    // var end = maxPage;

    // end = maxPage > this.options.showPage ? this.options.showPage : maxPage;

    if (this.pageIndex < 1) {
        this.pageIndex = 1;
    }

    if (this.pageIndex > maxPage) {
        this.pageIndex = maxPage;
    }

    // console.log(this.pageIndex);

    var start, end;
    if (this.pageIndex <= mid) {
        start = 1;
        // end = this.options.showPage;
        end = maxPage > this.options.showPage ? this.options.showPage : maxPage;
    } else if (this.pageIndex > mid && this.pageIndex <= maxPage - mid) {
        start = this.pageIndex - mid;
        end = this.pageIndex + mid;


        // 如果是偶数的时候 会多生成一个
        // 怎么解决?
        // 起点值 + 1    或者  终点值 -1


        // if (this.options.showPage % 2 == 0) {
        //     start += 1;  // 前两个后三个
        //     // end -= 1; // 前三个  后两个
        // }


    } else {
        start = maxPage - this.options.showPage + 1;
        end = maxPage;
    }

    start = start < 1 ? 1 : start;



    for (var i = start; i <= end; i++) {
        var li = document.createElement("li");
        if (i == this.pageIndex) {
            li.classList.add("active");
        }
        li.textContent = i;

        li.onclick = function () {
            _this.pageIndex = this.textContent * 1;
            _this.createPage();
            // if (_this.options.callback) {
            //     // _this.options.callback(_this.pageIndex);
            //     _this.options.callback(_this.pageIndex - 1);
            // }
        }

        this.pageBox.appendChild(li);
    }

    if (this.options.callback) {
        // this.options.callback(this.pageIndex);   //页码
        this.options.callback(this.pageIndex - 1);  //下标
    }


}
