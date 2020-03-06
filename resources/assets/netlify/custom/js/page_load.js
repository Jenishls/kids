$(document)
    .off("click", ".load_pages")
    .on("click", ".load_pages", function(e) {
        e.preventDefault();
        let self = $(this);
        if (
            self
                .parent()
                .parent()
                .hasClass("mainmenu")
        ) {
            self.parent()
                .siblings()
                .removeClass("current");
            self.parent().addClass("current");
        } else {
            self.parent()
                .parent()
                .parent()
                .siblings()
                .removeClass("current");
            self.parent()
                .parent()
                .parent()
                .addClass("current");
        }
        let url = $(this).attr("data-route");
        netlifyAjax(
            {
                url: url,
                method: "GET",
                data: ""
            },
            function(response) {
                setNewMeta();

                $("#page-section")
                    .empty()
                    .append(response);
            },
            function(error) {
                console.log(error);
            }
        );
    });

function setNewMeta() {
    netlifyAjax(
        {
            url: "/netlifytemp/getMeta/metacookie"
        },
        function(data) {
            $("head")
                .find("title")
                .html(data.page_title);
            $("meta[name=keyword]").attr("content", data.page_keyword);
            $("meta[name=description]").attr("content", data.page_desc);
        },
        function(err) {
            console.log(err);
        }
    );
}
