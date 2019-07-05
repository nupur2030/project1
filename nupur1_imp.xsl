<?xml version="1.0" encoding="UTF-8"?>
<xsl:transform version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
>
<xsl:template match="/">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Product Details</title>
</head>
<body>
<table border="4" bgcolor = "yellow">
<tr bgcolor = "red">
<th>Sl. No.</th>
<th>Product Name</th>
<th>Price</th>
</tr>
<xsl:for-each select="/productinfo/product">
<tr>
<td><xsl:value-of select="slno"/></td>
<td><xsl:value-of select="pname"/></td>
<td><xsl:value-of select="price"/></td>
</tr>
</xsl:for-each>
</table>
</body>   
 </html>    
</xsl:template>    
</xsl:transform>