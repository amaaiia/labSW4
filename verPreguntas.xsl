<?xml version="1.0" ?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <HTML>
            <HEAD>
                <style type='text/css'>
                    body{
                        font-family: verdana;
                        font-size:1;
                    }
                    
                    table th {
                        background-color:#d4e3e5;
                        padding: 8px;
                    }
                    
                    table td {
                        background-color: #B0FFAB;
                    }
                    
                    table tr {
                        text-align: center;
                    }
                </style>  
            </HEAD>
            <BODY>
                <TABLE border="1" align="center">
                    <THEAD>
                        <TR>
                            <TH>AUTOR</TH> <TH>TEMA</TH><TH>PREGUNTA</TH> <TH>CORRECTA</TH> <TH>INCORRECTAS</TH> <TH>COMPLEJIDAD</TH>
                        </TR>
                    </THEAD>
                        <xsl:for-each select="/assessmentItems/assessmentItem" >
                            <TR>
                                <TD>
                                    <xsl:value-of select="@author"/> 
                                </TD>
                                <TD>
                                    <xsl:value-of select="@subject"/>
                                </TD>
                                <TD>
                                    <xsl:value-of select="itemBody/p"/>
                                </TD>
                                <TD>
                                    <xsl:value-of select="correctResponse/value"/> 
                                </TD>
                                <TD>
                                    <ul>
                                        <li><xsl:value-of select="incorrectResponses/value[1]"/></li>
                                        <li><xsl:value-of select="incorrectResponses/value[2]"/></li>
                                        <li><xsl:value-of select="incorrectResponses/value[3]"/></li>
                                    </ul>
                                </TD>
                                <TD>
                                    <xsl:value-of select="@complexity"/> 
                                </TD>
                            </TR>
                        </xsl:for-each>
                 </TABLE>
            </BODY>
        </HTML>
    </xsl:template>
</xsl:stylesheet>