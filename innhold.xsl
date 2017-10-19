<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:output method="xml" encoding="UTF-8"></xsl:output>
  <xsl:template match="standard">
    <innholdsfortegnelse>
      <xsl:apply-templates />
      <xsl:value-of select="'&#xA;'" />
    </innholdsfortegnelse>
  </xsl:template>
  <xsl:template match="kapittel">
    <xsl:value-of select="'&#xA;'" />
    <xsl:value-of select="'&#009;'" />
    <innholdkap><xsl:value-of select="@tittel" /></innholdkap>
    <xsl:apply-templates select="seksjon"/>
  </xsl:template>
  <xsl:template match="seksjon">
    <xsl:value-of select="'&#xA;'" />
    <xsl:value-of select="'&#009;'" />
    <xsl:value-of select="'&#009;'" />
    <innholdsek><xsl:value-of select="@tittel" /></innholdsek>
    
  </xsl:template>
</xsl:stylesheet>
