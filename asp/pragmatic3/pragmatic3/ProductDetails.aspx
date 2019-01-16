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
            <div class="col">
                
            </div>
        </div>
    </div>
</asp:Content>
