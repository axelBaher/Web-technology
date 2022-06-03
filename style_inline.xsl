<?xml version="1.0" encoding="UTF-8"?>
<html xsl:version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <body style="font-family: Arial; font-size: 12pt; background-color: #EEE">
        <h1>Вакансии</h1>
        <xsl:for-each select="vacancies/vacancy">
            <div style="background-color: #deb5ff; padding: 4px">
                <span style="font-weight: bold"><img><xsl:attribute name="src"><xsl:value-of select="company_logo"/></xsl:attribute></img></span>
            </div>
            <div style="margin-left: 20px; margin-bottom: 1em; font-size: 14pt">
                <p>
                    <div style="font-size: 20pt"><b><xsl:value-of select="company_name"/></b></div><pre></pre>
                    <div style="font-style: italic"><b>Должность: </b><xsl:value-of select="position"/><pre></pre></div>
                    <div style="font-style: italic"><b>Зарплата: </b><xsl:value-of select="salary"/><pre></pre></div>
                    <div style="font-style: italic"><b>Опыт работы: </b><xsl:value-of select="experience"/><pre></pre></div>
                    <div style="font-style: italic"><b>Место работы: </b><xsl:value-of select="location"/></div>
                </p>
            </div>
        </xsl:for-each>
    </body>
</html>
