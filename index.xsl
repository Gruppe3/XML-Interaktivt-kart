<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:key name = "year-search" match = "row" use = "Year"/>

<xsl:variable name="landkoder">SWE,DNK,ISL,JPN,MEX,USA,CHN,AUS,THA,MAR</xsl:variable>

<xsl:param name="currency-codes" select="document('merged.xml')/root/valutakurs"/>
<xsl:param name="praktisk-info" select="document('merged.xml')/root/rad"/>

<xsl:template match="/">
  <html>
  <body>
    <h2>Praktisk info om et utvalg land</h2>
    <table border="1">
      <tr bgcolor="#9acd32">
        <th>Country</th>
        <!--<th>Country Code</th>
        <th>Year</th>-->
        <th>Population</th>
        <th>Currency</th>
        <th>Rate</th>
        <th>Språk</th>
        <th>Styreform</th>
        <th>Nasjonalrett</th>
        <th>Nasjonaldag</th>
        <th>Nasjonalsang</th>
        <th>Hovedstad</th>
        <th>Kjent for</th>
        <th>Visste du at...</th>
      </tr>
      <xsl:for-each select = "key('year-search', '2016')">
      <xsl:if test="contains($landkoder, CountryCode)">
        <tr>
          <td><xsl:value-of select="CountryName"/></td>
          <!--<td><xsl:value-of select="CountryCode"/></td>
          <td><xsl:value-of select="Year"/></td>-->
          <td><xsl:value-of select="Value"/></td>
          <td><xsl:value-of select="$currency-codes[land = current()/CountryName]/kode"/></td>
          <td><xsl:value-of select="$currency-codes[land = current()/CountryName]/overforsel/midtkurs"/></td>
          <td><xsl:value-of select="$praktisk-info[Country = current()/CountryName]/Language"/></td>
          <td><xsl:value-of select="$praktisk-info[Country = current()/CountryName]/Goverment"/></td>
          <td><xsl:value-of select="$praktisk-info[Country = current()/CountryName]/Dish"/></td>
          <td><xsl:value-of select="$praktisk-info[Country = current()/CountryName]/Day"/></td>
          <td><xsl:value-of select="$praktisk-info[Country = current()/CountryName]/Song"/></td>
          <td><xsl:value-of select="$praktisk-info[Country = current()/CountryName]/Capital"/></td>
          <td><xsl:value-of select="$praktisk-info[Country = current()/CountryName]/Top3"/></td>
          <td><xsl:value-of select="$praktisk-info[Country = current()/CountryName]/FunFact"/></td>
        </tr>
        </xsl:if>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>
