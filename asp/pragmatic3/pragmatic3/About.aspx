<%@ Page Title="About" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="About.aspx.cs" Inherits="pragmatic3.About" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    <h2><%: Title %>.</h2>
    <h3>This is a page about highly extensible and powerful text editor.</h3>
    <p>HyperEditor is based on Electron, a framework which is used to deploy Node.js applications for the desktop running on the Blink layout engine. Although it uses the Electron framework, the software does not use Atom and instead employs the same editor component (codenamed "Monaco") used in Hyper Team Services.
                In the Stack Overflow 2018 Developer Survey, Hyper Editor was ranked the most popular developer environment tool, with 34.9% of 75,398 respondents claiming to use it.</p>
</asp:Content>
