CREATE TABLE [dbo].[Products]
(
	[Id] INT NOT NULL PRIMARY KEY,
	[Type] INT,
	[ImageUrl] VARCHAR(255),
	[Title] VARCHAR(255),
	[Description] VARCHAR(512),
	[Price] REAL
)
