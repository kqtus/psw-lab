<%@ Page Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="ProductDetails.aspx.cs" Inherits="pragmatic3.ProductDetails" %>


<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    <div class="container">
        <div class="row" style="margin-top: 40px;">

            <div class="col-lg-8">
                <h3>
                    <asp:Label ID="ProductTitle" runat="server" Text="This is title"/>
                </h3>
                <h4>
                    <asp:Label ID="ProductAuthors" runat="server" Text="Authors" />
                </h4>

                <div style="margin-top: 50px;">
                    <asp:Label ID="ProductDescription" runat="server" Text="Basic description" />
                </div>
                
            </div>

            <div class="col-lg-3" style="text-align: right;">
                <asp:Image style="width: 100%;" ID="ProductImage" runat="server"/>
                <h3>
                    Price: <asp:Label ID="ProductPrice" runat="server" />$
                </h3>
            </div>
        </div>
        
        <div class="row" style="margin-top: 40px;">
            <div class="form-group col-lg-8">
                <asp:ListView runat="server" ID="CommentsPanel">
                    <ItemTemplate>
                        <div class="container" style="width: 100%; margin-top: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #d8d8d8; padding: 20px; padding-left: 40px; padding-right: 40px;">
                            <div class="row">
                                <%# Eval("Text") %>
                            </div>
                            <div class="row" style="font-style: italic; margin-top: 15px;">
                                <%# Eval("Author") %>
                                <%# Eval("Date") %>
                            </div>
                        </div>
                    </ItemTemplate>
                </asp:ListView>
                <hr />

                <asp:Panel runat="server" ID="CommentInpPanel">
                    <asp:TextBox runat="server" ID="CommentInput" CssClass="form-control"  style="width: 100%; max-width: 900px;" Rows="5" ToolTip="Enter your comment here..." TextMode="MultiLine"/>
                    <div style="text-align: right;">
                        <asp:Button runat="server" ID="CommentBtn" Text="Comment" CssClass="btn btn-success" OnClick="CommentBtn_Click"/>
                    </div>
                </asp:Panel>

                <asp:Panel runat="server" ID="CommentNoInpPanel">
                    <p>
                        You cannot add comments unless you are logged in.
                    </p>
                </asp:Panel>
            </div>
        </div>

    </div>
</asp:Content>
